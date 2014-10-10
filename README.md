#Banckle.Chat for Symfony

This bundle allows you to work with Banckle.Chat SDK in your Symfony applications quickly and easily. 


Installation
----------------------------------

Add the following lines to your composer.json file:

<pre>
// composer.json
{
    // ...
    require: {
        // ..
        "banckle/chat-sdk-php": "dev-master",
        "banckle/chat-bundle": "dev-master"

    }
}
</pre>


Now, you can install the new dependencies by running Composer's update command from the directory where your composer.json file is located.

<pre>
    composer update
</pre>


Update your AppKernel.php file, and register the new bundle:

<pre>
// app/AppKernel.php
public function registerBundles()
{
    // ...
     new Banckle\ChatBundle\BanckleChatBundle(),
    // ...
);
}
</pre>

Usage
----------------------------------

The Bundle is called as a standard service. To access service:

<pre>
$this->get('bancklechat.api');
</pre>
