#!/bin/bash
date=$(date +%Y-%m-%d)
prev_date=$(date -d "yesterday" '+%Y-%m-%d')
#echo $next_date
url1="http://10.0.15.96:9000/api/search/universal/absolute/export?query=ha_response_code%3A504&from="$prev_date"T11%3A00%3A00.000Z&to="$date"T03%3A00%3A00.000Z&fields=ha_chosen_backend%2Csource%2Crequested_url"
url2="http://10.0.15.96:9000/api/search/universal/absolute/export?query=ha_response_code%3A500&from="$prev_date"T11%3A00%3A00.000Z&to="$date"T03%3A00%3A00.000Z&fields=ha_chosen_backend%2Csource%2Crequested_url"
curl -u harshit.mandhyani@mykaarma.com:Harshit@123 $url1 >error504.csv
curl -u harshit.mandhyani@mykaarma.com:Harshit@123 $url2 >error500.csv