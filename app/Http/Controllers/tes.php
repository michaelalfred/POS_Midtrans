<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$pass = "daeripos";
$hash = Hash::make($pass);
echo $hash;