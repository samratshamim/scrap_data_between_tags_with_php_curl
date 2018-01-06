<?php

    function curl($url) {
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $url);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        $data = curl_exec($ch); 
        curl_close($ch);    
        return $data;   
    }

     function scrape_between($data, $start, $end){
        $data = stristr($data, $start); 
        $data = substr($data, strlen($start));  
        $stop = stripos($data, $end);   
        $data = substr($data, 0, $stop);    
        return $data;   
    }

    $scraped_page = curl("http://thefinancialexpress.com.bd");    
    $scraped_data = scrape_between($scraped_page, "<title>", "</title>");  
     
    echo $scraped_data;

?>