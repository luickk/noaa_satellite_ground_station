NOAA Satellite Station
===================

Easy to build NOAA weather satellite image receiving station which autmomaticly calculates pass time and recieves as well as decodes the signal, with nothing more than a raspberry pi and a sdr stick as well as an antenna!

You can checkout the live project Webinterface [here](http://rtlopa.ddns.net/)!

----------

#### <i class="icon-down-big"></i> Installation

> - Clone Repository
> - remove www folder <br>
> - Install Dependencies <br>
  apt-get install at <br>
  apt-get install rtl-sdr <br>
  apt-get install predict <br>
  apt-get install sox <br>
  apt-get install libusb-1.0 <br>
  apt-get install cmake <br>
  wget http://www.wxtoimg.com/beta/wxtoimg-armhf-2.11.2-beta.deb <br>
  dpkg -i wxtoimg-armhf-2.11.2-beta.deb <br>
> - Check stick <br>
	sudo rtl_test <br>
> - Change predict ground station location <br>
	predict <br>
> - Give sat.sh execution rights <br>
	chmod +x sat.sh <br>
> - Add script to crontab for auto execution <br>
	crontab -e <br>
	add "1 0 * * * <path to sat.sh>/sat.sh" to crontab file <br>
> - Run sat.sh <br>
> - Check for satellite passes <br>
	atq <br>
> - If everything went as expected you should see a list with satellite passes for this day <br>
> - You will find the final pictures with all the other meta files(.wav, .txt, -map.png, .png) at /var/www/html/sat/{pass}/ <br>


### Install Webinterface

> - Install Dependencies <br>
  apt-get install apache2 <br>
  apt-get install php5 libapache2-mod-php5 php5-mcrypt <br>
> - move .php and src files/folders to /var/www/html/ <br>
> - Your Web Interface is ready, have fun! <br>

Partlist
-------------------

> [Raspberry Pi](https://www.amazon.de/gp/product/B01CD5VC92/ref=oh_aui_detailpage_o08_s00?ie=UTF8&psc=1) <br>
> [SDR Stick](https://www.amazon.de/gp/product/B01CD5VC92/ref=oh_aui_detailpage_o08_s00?ie=UTF8&psc=1) <br>
> [Antenna Tutorial](http://lna4all.blogspot.de/2017/02/diy-137-mhz-wx-sat-v-dipole-antenna.html) <br>

Images
-------------------

![Raspberry Pi](media/1.jpg)

![Antenna](media/2.png)

![Sat image](media/3.png)

![Website](media/4.jpg)
