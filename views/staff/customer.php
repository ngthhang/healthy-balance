<?php
$all_customer = User::getAll();
$total_user = count($all_customer);
?>
<div class="d-flex flex-column align-items-start justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color w-700">ALL CUSTOMERS (<?= $total_user ?>)</h5>
    <form action="index.php" method="get" name="searchCustomer" class="w-100 d-flex flex-row align-items-center justify-content-start">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" class="search bg-white col-xl-10 col-md-10 col-lg-10 p-0 py-2 px-2" placeholder="Search customer" name="item">
        <button class="btn pink-bg text-white px-5 py-2 ml-2" onclick='search()'>Search</button>
    </form>
</div>