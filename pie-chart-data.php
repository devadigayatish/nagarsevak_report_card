<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$prabhag_no = $_GET['prabhag_no'];
if($prabhag_no)
{
    echo get_pie_chart_data($prabhag_no);
}