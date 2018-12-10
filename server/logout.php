<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 04/12/2018
 * Time: 17:46
 */
session_save_path("File System");
session_start();
session_destroy();

