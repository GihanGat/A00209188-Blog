
<div>
<h1>New Blog Post</h1>
<form method="post" action="/blogpost/create">
    <input type="hidden" value="" name="csrf">
    <label for="title">Title</label>
    <input type="text" id="title" name="title">
    <label for="category">Category</label>
    <select id="category" name="category">
        <option value="education">Education</option>
        <option value="sports">Sports</option>
        <option value="entertainment">Entertainment</option>
        <option value="health">Health</option>
        <option value="food">Food</option>
    </select>
    <label for="content">Content</label>
    <textarea name="content" id="content" rows="6" cols="50"></textarea>
    <input type="submit">
</form>
</div>