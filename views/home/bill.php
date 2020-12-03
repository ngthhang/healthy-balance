<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
        <h5 class="pink-color w-700">BILL&PAYMENT</h5>
        <form action="index.php" method="GET" name="payment">
            <input type="text" name="controller" value="bill" id='controller' style="display: none">
            <input type="text" name="action" value="payment" id='action' style="display: none">
            <button class="btn blue-bg text-white font-weight-bold px-4">MAKE A PAYMENT</button>
        </form>
    </div>
    <table class="table bill bg-white rounded">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DATE</th>
                <th scope="col">COURSE</th>
                <th scope="col">PRICE</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bill">
                <th scope="row">1</th>
                <td>15/09/2020</td>
                <td>Yoga class</td>
                <td>1.500.000 VND</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>15/09/2020</td>
                <td>Yoga class</td>
                <td>1.500.000 VND</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>15/09/2020</td>
                <td>Yoga class</td>
                <td>1.500.000 VND</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>15/09/2020</td>
                <td>Yoga class</td>
                <td>1.500.000 VND</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>