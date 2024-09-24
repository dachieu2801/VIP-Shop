@extends('layout.master')
@section('body-class', 'page-categories')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row ">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Nhập mã đơn hàng hoặc SĐT để kiểm tra</h1>
            <form id="orderTrackingForm" class="d-flex">
                <input type="text" class="form-control me-2" id="inputField" placeholder="Nhập mã đơn hàng hoặc số điện thoại" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="result" class="mt-4"></div>
        </div>
    </div>
</div>
<style>
    .table-container {
        /* overflow-x: auto; */
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }

    .custom-table th, .custom-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .custom-table th {
        background-color: #007bff;
        color: white;
    }

    .custom-table tr:hover {
        background-color: #f1f1f1;
    }

    .custom-table th {
        cursor: pointer;
        background-color: #fd560f;
        color: white;
        font-weight: bold;
    }

    .custom-table th.sortable:hover {
        background-color: #0056b3;
    }

    .custom-table td {
        font-size: 14px;
        color: #333;
    }

    .custom-table .highlight {
        background-color: #e9ecef;
    }

    .custom-table .highlight:hover {
        background-color: #dee2e6;
    }


</style>

<script>
document.getElementById('orderTrackingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way
    const inputField = document.getElementById('inputField');
    const orderNumber = inputField.value;
    const baseUrl = '{{ config('app.url') }}';

    fetch(`${baseUrl}/order-tracking/${orderNumber}`)
        .then(response => response.json())
        .then(data => {
            console.log(JSON.parse(data))
            renderResult(JSON.parse(data));
        })
        .catch(error => {
            console.error('Error fetching order data:', error);
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `<div class="alert alert-danger" role="alert">Có lỗi xảy ra. Vui Lòng thử lại sau !.</div>`;
        });
});

function renderResult(data) {
    console.log(data);
    const resultDiv = document.getElementById('result');
    if (data.length > 1) {
        let tableRows = '';
        data.forEach((order,index) => {
            tableRows += `
                <tr>
                    <td>${index+1}</td>
                    <td>${order.number}</td>
                    <td>${order.customer_name}</td>
                    <td>${order.email}</td>
                    <td>${order.total_format}</td>
                    <td>${order.status}</td>
                    <td>${order.shipping_method_name}</td>
                    <td>${order.shipping_address_1},${order.shipping_city},${order.shipping_country}</td>
                    <td>${order.payment_method_name}</td>
                    <td>${order.created_at}</td>
                </tr>
            `;
        });

        resultDiv.innerHTML = `
            <div class="table-container">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Số đơn hàng</th>
                            <th>Tên người đặt</th>
                            <th>Email</th>
                            <th>Tổng giá trị</th>
                            <th>Trạng thái</th>
                            <th>Phương thức vận chuyển</th>
                            <th>Địa chỉ</th>
                            <th>Phương thức thanh toán</th>
                            <th>Ngày tạo đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${tableRows}
                    </tbody>
                </table>
            </div>
        `;
    } else if (data.length === 1) {
        const order = data[0];
        resultDiv.innerHTML = `
            <div class="card shadow rounded">
               <div class="card-body">
                    <h5 class="card-title text-center">Số đơn hàng: ${order.number}</h5>
                    <p class="card-text"><strong>Tên người đặt:</strong> ${order.customer_name}</p>
                    <p class="card-text"><strong>Email:</strong> ${order.email}</p>
                    <p class="card-text"><strong>Tổng giá trị:</strong> ${order.total_format}</p>
                    <p class="card-text"><strong>Trạng thái:</strong> ${order.status_format}</p>
                    <p class="card-text"><strong>Phương thức vận chuyển:</strong> ${order.shipping_method_name}</p>
                    <p class="card-text"><strong>Địa chỉ:</strong> ${order.shipping_address_1}, ${order.shipping_city}, ${order.shipping_country}</p>
                    <p class="card-text"><strong>Phương thức thanh toán:</strong> ${order.payment_method_name}</p>
                    <p class="card-text"><strong>Ngày tạo đơn:</strong> ${order.created_at}</p>
                </div>
            </div>
        `;
    } else {
        resultDiv.innerHTML = `<div class="alert alert-warning" role="alert">Không tìm thấy đơn hàng nào.</div>`;
    }
}
</script>
@endsection
