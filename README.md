NOAA Satellite Station
===================

Easy to build NOAA weather satellite image receiving station, with nothing more than a raspberry pi and a sdr stick as well as an antenna!

----------

#### <i class="icon-down-big"></i> Installation

> - Clone Repository
> - Install Dependencies
  - >> apt-get install at
  - >> apt-get install rtl-sdr
  - >> apt-get install predict
  - >> apt-get install sox
  - >> apt-get install libusb-1.0
  - >> apt-get install cmake
  - >> wget http://www.wxtoimg.com/beta/wxtoimg-armhf-2.11.2-beta.deb
      - >> dpkg -i wxtoimg-armhf-2.11.2-beta.deb
> - Check stick
	- >> sudo rtl_test
> - Change predict ground station location
	- >> predict
> - Give sat.sh execution rights
	- >> chmod +x sat.sh
> - Add script to crontab for auto execution
	- >> crontab -e
	add "1 0 * * * <path to sat.sh>/sat.sh" to crontab file
> - Run sat.sh
> - Check for satellite passes
	- >> atq
	If everything went as expected you should see a list with satellite passes for this day
> - You will find the final pictures at /home/pi/sat_data

Partlist
-------------------

> [Raspberry Pi](https://www.amazon.de/gp/product/B01CD5VC92/ref=oh_aui_detailpage_o08_s00?ie=UTF8&psc=1)
> [SDR Stick](https://www.amazon.de/gp/product/B01CD5VC92/ref=oh_aui_detailpage_o08_s00?ie=UTF8&psc=1)
> [Antenna Tutorial](http://lna4all.blogspot.de/2017/02/diy-137-mhz-wx-sat-v-dipole-antenna.html)

Images
-------------------

[Raspberry Pi](https://preview.ibb.co/hc8znS/2018_04_10_17_03_50.jpg)

[Antenna](https://image.ibb.co/gcxs7S/2018_04_11_17_06_29.jpg)

[Sat image](https://preview.ibb.co/naQqu7/NOAA1920180413_163052.png)

[Sat image map](https://image.ibb.co/btf11n/NOAA1920180413_163052_map.png)
