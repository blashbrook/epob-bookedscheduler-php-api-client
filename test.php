<?php
/**
 * Created by PhpStorm.
 * User: blashbrook
 * Date: 11/24/15
 * Time: 2:44 PM
 */
require_once(‘bookedapi.php’);
 //some of your code
 startsession();
 $username = ‘Admin’;
 $password = ‘password';
 $bookedApiUrl = ‘http://localhost:8888/epob-bookedscheduler';
 $bookedapiclient = new bookedapiclient($username, $password, $bookedApiUrl);
 $bookedapiclient-> authenticate(true);

//the next call will get all reservations for the current user or all of them if that user is the admin
 $allReservations = $bookedapiclient->getReservation();

 //print the result to the screen
 print_r($allReservations);
?>