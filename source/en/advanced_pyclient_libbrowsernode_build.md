<!--toc=advanced-->
# Libbrowsernode Build Instructions

Build instructions on Ubuntu 12.04.4:

*   Install the following packages: git-core gyp cmake libvdpau-dev

*   Download Berkelium Sources:

    ``` 
    git clone git://github.com/sirikata/berkelium
    cd berkelium
    git submodule update --init --recursive
    ./util/build-chromium.sh --deps --force

    ```

*   The Chromium sources will download. Once the download completes, and the building begins, manually patch build/chromium/src/net/base/x509_certificate_nss.c as follows:

    ```
    --- x509_certificate_nss.cc 2014-02-08 22:57:17.379760998 +0000
    +++ x509_certificate_nss.cc 2014-02-09 09:21:17.633417195 +0000
    @@ -188,7 +188,12 @@
       }
     }

    -typedef char* (*CERTGetNameFunc)(CERTName* name);
    +
    +#if NSS_VMINOR >= 15
    +  typedef char* (*CERTGetNameFunc)(CERTName const* name);
    +#else
    +  typedef char* (*CERTGetNameFunc)(CERTName* name);
    +#endif

    ```


*   Allow the build to complete normally. This will take several hours, and requires around 4GB of RAM at times.

*   Once the Chromium build completes, build Berkelium as follows:

    ```
    cmake . -DCMAKE_BUILD_TYPE=Release
    make
    sudo make install

    ```

*   It may well be that Berkelium fails to build at the linking stage. If so, edit the file CMakeFiles/libberkelium.dir/link.txt and remove all instances of the string -ljpeg. Be sure to only select -ljpeg and nothing else. Save the file and run make again to complete the build.

*   Run the following to build the libbrowsernode library:

    ``` 
    touch a.cpp
     g++ -c a.cpp -o a.o
     g++ a.o  -shared -llibberkelium -o libberkeliumwrapper.so

    ```

*   Copy the resulting libberkeliumwrapper.so to /usr/lib

    ```
    sudo ldconfig

    ```

*   Copy resources.pak, libffmpegsumo.so, chrome.pak and berkelium from /usr/local/bin to /usr/bin

*   Download Libavg 1.7.1 Sources:

    ```
    sudo apt-get install subversion automake autoconf libtool libxml2-dev \
    libpango1.0-dev librsvg2-dev libgdk-pixbuf2.0-dev libavcodec-dev libavformat-dev \
    libswscale-dev python-dev libboost-python-dev libboost-thread-dev g++ libSDL-dev \
    libxxf86vm-dev libdc1394-22-dev linux-libc-dev libvdpau-dev

    svn co -r 9546 https://www.libavg.de/svn/trunk/libavg

    cd libavg

    ```

*   Download libbrowsernode patches [[3]](https://code.launchpad.net/browsernode)

*   Copy the browsernode release files in to src/test/plugin folder.

*   Copy the Berkelium header files in to src/test/plugin (ie src/test/plugin/berkelium)

*   Copy /usr/local/lib/liblibberkelium.so in to src/test/plugin

*   Build libavg as normal:

    ```
    ./bootstrap
    ./configure --enable-dc1394 --enable-v4l2
    make
    sudo make install

    ```