
Step 1.) Copy these files into root of php site

Step 2.) edit oauth.php and change the CHANGEME values at top of file to match your site

Step 3.) Make sure your app uses sessions remember Before you can store user information in your PHP session, you must first start up the session. Note: The session_start() function must appear BEFORE the <html> tag:


Step 4.) In your php app here is a snippet that shows a login link or user's first name and logout link 

<?php if(isset($_SESSION['unity_token'])){ ?>
 	Welcome, <?php echo $_SESSION['first_name']?> | <a href="/oauth.php?auth_logout=true">Sign Out</a>
<?php } else { ?>
     <a href="/oauth.php?auth_redirect=true">Sign In</a>
 <?php } ?>

Step 5.) the block if(isset($_SESSION['unity_token'])) can be used to determine if a user is authenticated and is a Bahai.

Notes:

oauth.php is a wrapper around the oauth-php library, further information can be found at:

https://code.google.com/p/oauth-php/
