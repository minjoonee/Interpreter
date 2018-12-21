#!/bin/sh


id="inter"
pw="771029"
db="interpreter"
query="select input1 from board "

result=$(exec mysql -u$id -p771029 -Nse "select input1 from board where id='$1i'")

for i in $result; do
	echo "$i"
done

