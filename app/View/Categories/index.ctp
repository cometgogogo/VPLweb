<h1>Categories</h1>
<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Description</th>
</tr>
<!-- Here's where we loop through our $posts array, printing out
post info -->
<?php foreach ($categories as $category): ?>
<tr>
<td><?php echo $category['Category']['CategoryID']; ?></td>
<td>
<?php echo $this->Html->link($category['Category']['CategoryName'], "/categories/view/".$category['Category']['CategoryID']); ?>
</td>
<td>Test</td>
</tr>
<?php endforeach; ?>
</table>