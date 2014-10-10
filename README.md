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

Configuration
----------------------------------

Add this to your config.yml:

<pre>
banckle_chat:
    #(Required) Your Account apiKey from apps.banckle.com
    apiKey: "XXXXXXXXXXXXX"
    banckleAccountUri: "https://apps.banckle.com/api/v2"
    banckleChatUri: "https://chat.banckle.com/v3"
</pre>

Usage
----------------------------------

The Bundle is called as a standard service. 

<pre>
To access service:
$bancklechat = $this->get('bancklechat.api');

To generate token:
$bancklechat = $this->get('bancklechat.api');
$token = $bancklechat->getToken($email, $password);

To access all departments:
$department = $bancklechat->createInstance('DepartmentsApi', $token);
$result = $department->getDepartments();
</pre>
