#!/bin/bash

# Path to this file
path="/home/pi/sat.sh"

main () {
	# check for arguments
    if [ "$#" -eq 0 ]; then
		# update sat orbit data
		update_sat_data
		# epmty pass.txt
		> /var/www/html/sat/passes.txt
		#Schedule Satellite Passes:
		set_sat_cycle "NOAA 19" 137.1000
		set_sat_cycle "NOAA 18" 137.9125
	else
		# start recording if arg < 0 and pass data
		# $1 = Satellite Name
		# $2 = Frequency
		# $3 = FileName base
		# $4 = TLE File
		# $5 = EPOC start time
		# $6 = Time to capture
		# $7 = File Path
		rec_sat_data "$1" "$2" "$3" "$4" "$5" "$6" "$7"
	fi
}

set_sat_cycle() {
	# cutting upper part of prediction
	PREDICTION_START=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | head -1`
	# cutting lower part of prediction
	PREDICTION_END=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | tail -1`

	# extracting end date
	var2=`echo $PREDICTION_END | cut -d " " -f 1`
	
	# extracting elevation
	MAXELEV=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | awk -v max=0 '{if($5>max){max=$5}}END{print max}'`
	
	# converting dates
	while [ `date --date="TZ=\"UTC\" @${var2}" +%D` == `date +%D` ]; do

	# extracting start time
	START_TIME=`echo $PREDICTION_START | cut -d " " -f 3-4`
	
	# extracting start time
	var1=`echo $PREDICTION_START | cut -d " " -f 1`

	# extracting end time
	var3=`echo $START_TIME | cut -d " " -f 2 | cut -d ":" -f 3`

	# calc pass tim
	TIMER=`expr $var2 - $var1 + $var3`
	
	# converting dates
	OUTDATE=`date --date="TZ=\"UTC\" $START_TIME" +%Y%m%d-%H%M%S`
	
	# check pass elevation
	if [ $MAXELEV -gt 19 ]
	  then
		# path for final file location
		path_temp="/var/www/html/sat/${1//" "}${OUTDATE}"
		echo ${1//" "}${OUTDATE} $MAXELEV
		# create at job
		echo "$path \"${1}\" $2 $path_temp/NOAA /etc/sat_data/data.tle $var1 $TIMER $path_temp" | at `date --date="TZ=\"UTC\" $START_TIME" +"%H:%M %D"`
		time_cest=`date -d "$START_TIME UTC"`
		# tee passes to pass file
		echo "$1, $2, $time_cest" | tee -a /var/www/html/sat/passes.txt
	fi
	
	nextpredict=`expr $var2 + 60`

	PREDICTION_START=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" $nextpredict | head -1`
	PREDICTION_END=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}"  $nextpredict | tail -1`

	MAXELEV=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" $nextpredict | awk -v max=0 '{if($5>max){max=$5}}END{print max}'`

	var2=`echo $PREDICTION_END | cut -d " " -f 1`

	done
}

rec_sat_data () {
	# $1 = Satellite Name
	# $2 = Frequency
	# $3 = FileName base
	# $4 = TLE File
	# $5 = EPOC start time
	# $6 = Time to capture
	# $7 = File Path
	
	# create folder for final files
	mkdir $7

	# create NOAA.txt and save pass data
	touch $7/NOAA.txt
	time_now=`date`;
	# save pass data in NOAA.txt 
	echo "$1,$2,$time_now" > $7/NOAA.txt
	
	# start recording
	sudo timeout $6 rtl_fm -f ${2}M -s 60k -g 45 -p 55 -E wav -E deemp -F 9 - | sox -t wav - $3.wav rate 11025
	
	# calc pass start time
	PassStart=`expr $5 + 90`


	if [ -e $3.wav ]; then
		/usr/local/bin/wxmap -T "${1}" -H $4 -p 0 -l 0 -o $PassStart ${3}-map.png

		/usr/local/bin/wxtoimg -m ${3}-map.png -e ZA $3.wav $3.png
	fi
}

update_sat_data () {
	for i in `atq | awk '{print $1}'`; do atrm $i; done

	if [ ! -d /etc/sat_data ] || [ ! -d /var/www/html/sat ] ; then
	  mkdir -p /etc/sat_data;
	  mkdir -p /var/www/html/sat;
	fi

	# downloading updated sat information
	wget -qr https://www.celestrak.com/NORAD/elements/weather.txt -O /etc/sat_data/data.txt
	grep "NOAA 18" /etc/sat_data/data.txt -A 2 >> /etc/sat_data/data.tle
	grep "NOAA 19" /etc/sat_data/data.txt -A 2 >> /etc/sat_data/data.tle
}

main "$@"
