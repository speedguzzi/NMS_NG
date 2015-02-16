Developing for NMS_NG has never been easier.

Thanks to [Wes Kennedy](https://twitter.com/livearchivist), there is
now a vagrant file that will allow you to install a virtual machine
that has NMS_NG already running on it!

To get started, you can just copy the script from `/contrib/dev_init`,
or you can enter the following commands into your shell:

```
mkdir -p dev/NMS_NG && cd $_
curl -O http://wkennedy.co/uploads/NMS_NG/Vagrantfile
curl -O http://wkennedy.co/uploads/NMS_NG/bootstrap.sh
chmod +x bootstrap.sh
vagrant up
```

This may take a few minutes and requires you to already have Vagrant
installed.  If you don't have Vagrant installed, it's easy to setup.
See the [installation instructions here](http://docs.vagrantup.com/v2/installation/).