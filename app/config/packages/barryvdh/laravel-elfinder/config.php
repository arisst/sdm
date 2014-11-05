<?php
// $path_home = (Auth::user()->level==1) ? 'files' : 'files/users/'.Auth::user()->id ;

$mount = array( //role user / my file
    array(
            'driver'        => 'LocalFileSystem', 
            'path'          => 'files/users/'.Auth::user()->id, 
            'alias'         => Auth::user()->name,
            // 'accessControl' => 'users',
            'attributes' => array(
                array(
                    'pattern' => '/\.(?:tmb|htaccess|quarantine)$/i',
                    'hidden'  => true
                ),
                array(  //Disable delete
                    'pattern' => '/.+/',
                    'read'  => true,
                    'write' => true,
                    'locked' => true,
                )
            )
        )
    );

if(Auth::user()->level==1) //role admin all file
{
    foreach (User::all() as $key) { 
        $divisi = $key->division;
        $mount2 = array(
                'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
                'path'          => 'files/users/'.$key->id,  // path to files (REQUIRED)
                // 'URL'           => 'http://localhost/sdm/files/',   // URL to files (REQUIRED)
                'alias'         => $key->id.'. '.$key->name.' - '.$divisi['name'],
                'attributes' => array(
                    array(
                        'pattern' => '/\.(?:tmb|htaccess|quarantine)$/i',
                        'hidden'  => true,
                    )
                )
            );
        array_push($mount, $mount2);
    }
}

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */

    // 'dir' => 'files',

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    // 'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess()',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    // 'roots' => array(
    //     array(
    //         'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
    //         'path'          => 'files',  // path to files (REQUIRED)
    //         // 'URL'           => 'http://localhost/sdm/files/',   // URL to files (REQUIRED)
    //         'alias'         => $a->name, // The name to replace your actual path name. (OPTIONAL)
    //         // 'accessControl' => 'access',      // disable and hide dot starting files (OPTIONAL)
    //         'attributes'    => array(
    //                             array(
    //                                 'pattern' => '/^test$/',
    //                                 'read'  =>  true,
    //                                 'write'  =>  false,
    //                                 'locked'  =>  false,
    //                                 'hidden'  =>  true
    //                                 )
    //             )
    //     ),
    // ),

    'roots' => $mount,


);
