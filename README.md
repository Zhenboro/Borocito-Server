# Borocito-Server
Server-Side things

## Usage
Just download this as a ZIP file and upload it on your server via FTP.  
Then extract the ZIP.  

That't it! You should see this file from your domain/ip like https://example.com/README.md  

After that, update the URLS on the files for your URL/IP.  
Like in `Globals.ini`:  
```ini
# Borocito Configuration File
[General]
Enabled=True
FallbackServer=None
[Borocitos]
Version=0.3.0.0
Binaries=https://github.com/Borocito/Borocito-CLI/releases/download/latest/Borocitos.zip # OPTIONALLY, CHANGE THIS
[boro-get]
Name=boro-get
Author=Zhenboro
Website=https://github.com/Borocito/Components-for-Borocito/tree/main/boro-get
Version=1.2.0.0
Repository=http://borocito.local/api/boro-get/repository # CHANGE THIS
Binaries=https://github.com/Borocito/Components-for-Borocito/releases/download/latest/boro-get.zip # OPTIONALLY, CHANGE THIS
```
> This can be a pain in the ass, but should be done.  

The files that requires your changes are:  
 - /Globals.ini: As the example above.
 - /api/key-pairs.php: Create the desired Key-pairs inside the $KEY_PAIRS variable.
 - /api/boro-get.php: Opcionally, but recommended. Add your domain full URL inside the $URL variable.

_You can use the `url-changer.py` Python script file. It will ask for the directory where to found files and then the URL/IP to replace `borocito.local` with. Read the comments (in spanish) for help_  
