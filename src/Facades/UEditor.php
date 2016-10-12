<?php
namespace Walthere\UEditor\Facades;
use Illuminate\Support\Facades\Facade;

class UEditor extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'Ueditor';
    }

}