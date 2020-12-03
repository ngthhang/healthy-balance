<div class="d-flex flex-column col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700">BILL 1</h5>
    <div class="card bg-white course-info d-flex flex-column align-items-center rounded w-100 p-0">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color">Bill Detail</h6>
        <table class="table table-borderless ml-3 my-3">
            <tr>
                <td class="label">DATE</td>
                <td colspan="2" class="blue-color w-600 pl-4">everyday</td>
            </tr>
            <tr>
                <td class="label">TIME</td>
                <td colspan="2" class="blue-color w-600 pl-4">18:00-19:00</td>
            </tr>
            <tr>
                <td class="label">PLACE</td>
                <td colspan="2" class="blue-color w-600 pl-4">Room 2 in 1st Floor</td>
            </tr>
            <tr>
                <td class="label">ID</td>
                <td colspan="2" class="blue-color w-600 pl-4">123acCV</td>
            </tr>
            <tr>
                <td class="label">AVAILABLE</td>
                <td colspan="2" class="blue-color w-600 pl-4"><span class="bluesky-color w-700">15</span> / 20</td>
            </tr>
            <tr>
                <td class="label">PRICE</td>
                <td colspan="2" class="pink-color w-600 pl-4">1.500.000 VND <span class="blue-color t-14">( per month )</span></td>
            </tr>
            <tr>
                <td class="label">DESCRIPTION</td>
                <td colspan="2" class="blue-color w-600 pl-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere aliquid voluptatibus enim dignissimos sequi quia ea. Libero commodi eaque distinctio sapiente sequi veritatis, esse laborum obcaecati exercitationem modi. Et, ipsum!</td>
            </tr>
            <tr>
                <td class="label">DISCOUNT</td>
                <td colspan="2" class="lightgray-color w-600 pl-4">Not available</td>
            </tr>
        </table>
    </div>
    <form action="index.php" class="my-3 w-700 align-self-end" name='return' method='GET'>
        <input type="text" name="controller" value="home" id='controller' style="display: none">
        <input type="text" name="action" value="bill" id='action' style="display: none">
        <button class="px-4 btn blue-bg text-white">RETURN</button>
    </form>
</div>