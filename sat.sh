#!/bin/bash

path=`pwd`/sat.sh

main () {
    if [ "$#" -eq 0 ]; then
		update_sat_data
		#Schedule Satellite Passes:
		set_sat_cycle "NOAA 19" 137.1000
		set_sat_cycle "NOAA 18" 137.9125
	else
		rec_sat_data $1 $2 $3 $4 $5 $6
	fi
}

set_sat_cycle() {

	PREDICTION_START=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | head -1`
	PREDICTION_END=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | tail -1`


	var2=`echo $PREDICTION_END | cut -d " " -f 1`

	MAXELEV=`/usr/bin/predict -t /etc/sat_data/data.tle -p "${1}" | awk -v max=0 '{if($5>max){max=$5}}END{print max}'`

	while [ `date --date="TZ=\"UTC\" @${var2}" +%D` == `date +%D` ]; do

	START_TIME=`echo $PREDICTION_START | cut -d " " -f 3-4`
	var1=`echo $PREDICTION_START | cut -d " " -f 1`

	var3=`echo $START_TIME | cut -d " " -f 2 | cut -d ":" -f 3`

	TIMER=`expr $var2 - $var1 + $var3`

	OUTDATE=`date --date="TZ=\"UTC\" $START_TIME" +%Y%m%d-%H%M%S`

	if [ $MAXELEV -gt 19 ]
	  then
		echo ${1//" "}${OUTDATE} $MAXELEV

		echo "$path \"${1}\" $2 /home/pi/sat_data/${1//" "}${OUTDATE} /etc/sat_data/data.tle $var1 $TIMER" | at `date --date="TZ=\"UTC\" $START_TIME" +"%H:%M %D"`

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

	sudo timeout $6 rtl_fm -f ${2}M -s 60k -g 45 -p 55 -E wav -E deemp -F 9 - | sox -t wav - $3.wav rate 11025

	PassStart=`expr $5 + 90`

	if [ -e $3.wav ]; then
		/usr/local/bin/wxmap -T "${1}" -H $4 -p 0 -l 0 -o $PassStart ${3}-map.png

		/usr/local/bin/wxtoimg -m ${3}-map.png -e ZA $3.wav $3.png
	fi
}

update_sat_data () {
	for i in `atq | awk '{print $1}'`; do atrm $i; done

	if [ ! -d /etc/sat_data ] || [ ! -d /home/pi/sat_data ] ; then
	  mkdir -p /etc/sat_data;
	  mkdir -p /home/pi/sat_data;
	fi

	# downloading updated sat information
	wget -qr https://www.celestrak.com/NORAD/elements/weather.txt -O /etc/sat_data/data.txt
	grep "NOAA 18" /etc/sat_data/data.txt -A 2 >> /etc/sat_data/data.tle
	grep "NOAA 19" /etc/sat_data/data.txt -A 2 >> /etc/sat_data/data.tle
}

main "$@"
