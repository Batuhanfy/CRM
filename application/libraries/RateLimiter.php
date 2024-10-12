<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 1.10.2024
 * ⏰ Time: 00:45
 * 📄 File: Rate_limiter.php
 * 📧 Contact: iletisim@batuhankorkmaz.com | bthnkkz@yahoo.com
 * 💼 LinkedIn: https://www.linkedin.com/in/batuhan-korkmaz-180ab4318/
 * 💻 GitHub: https://github.com/Batuhanfy 
 * ============================================================
 * 💡 Description: 
 * This code has been crafted with precision and a strong
 * emphasis on clean coding principles. Every effort has been
 * made to ensure reliability, performance, and maintainability.
 * 
 * If you encounter any issues or have suggestions, please don't 
 * hesitate to reach out via the contact information provided above.
 * ============================================================
 -->
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RateLimiter {

    protected $CI;
    protected $maxRequests;
    protected $timeFrame; // (saniye cinsinden olacak)
    protected $ip;

    public function __construct($config = []) {
        $this->CI =& get_instance();


        $this->maxRequests = isset($config['max_requests']) ? $config['max_requests'] : 500;
        $this->timeFrame = isset($config['time_frame']) ? $config['time_frame'] : 3600;


        $this->ip = $this->CI->input->ip_address();

    }


    public function isAllowed() {
        $this->CI->load->driver('cache');


        $requestCount = $this->CI->cache->get($this->ip);

        if ($requestCount === FALSE) {

            $this->CI->cache->save($this->ip, 1, $this->timeFrame);
            return true;
        }

        if ($requestCount >= $this->maxRequests) {

            res('forbidden','Çok fazla istek gönderdiniz.');
            return false;
        } else {

            $this->CI->cache->save($this->ip, $requestCount + 1, $this->timeFrame);
            return true;
        }
    }


    public function getRemainingRequests() {
        $requestCount = $this->CI->cache->get($this->ip);
        return $this->maxRequests - ($requestCount ? $requestCount : 0);
    }
}