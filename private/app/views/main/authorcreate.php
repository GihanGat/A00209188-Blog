
<div>
<h1>New Author </h1>
<form method="post" action="/bloggerlog/registernewauthor">
    <input type="hidden" name="csrftoken" value="<?php echo($csrfToken) ?>">
    <input type="hidden" value="" name="csrf">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <label for="display_name">Display Name</label>
    <input type="text" id="display_name" name="display_name">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name">
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name">
    <label for="intro">Introduction</label>
    <textarea name="intro" id="intro" rows="2" cols="50"></textarea>
    <label for="profile">Profile</label>
    <textarea name="profile" id="profile" rows="6" cols="50"></textarea>

    <input type="submit">
</form>
</div>