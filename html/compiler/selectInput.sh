#!/bin/sh


id="db_id"
pw="db_pw"
db="db_name"
query="select input1 from board "

result=$(exec mysql -u$id -p771029 -Nse "select input1 from board where id='$1i'")

for i in $result; do
	echo "$i"
done

