<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختار السهم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/stock-preformance-style.css')}}">

    <style>

        .selected-row {
            background: #ff0076 !important;
        }
    </style>
</head>

<body>

<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-end">
            <img src="{{asset('assets/media/small chart.jpg')}}" alt="" class="header-img me-2">
            <a href="#" class="fs-5 bold-text">رابط أسعار جميع أسهم تداول وأخبار السوق</a>
        </div>
        <h4 class="text-center title-banner">تحليل أداء الأسهم واختيار أسهم المحفظة</h4>
        <img src="{{asset('assets/media/dan logo.jpg')}}" alt="الشعار" class="logo-img">
    </div>
</div>

<div class="container my-4">
    <div class="row g-3">
        <div class="col-md-6">
            <h5 class="caption-1">أسماء الشركات المدرجة في سوق التداول السعودي</h5>
            <input type="text" class="form-control text-center" id="search-input" placeholder="البحث بإسم أو رمز الشركة">

            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">اسم ورمز الشركة</th>
                        <th class="text-center">القطاع</th>
                        <th style="width: 20%;" class="text-center">مؤشر القطاع</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6 right-section">
            <div class="button-group">
                <button class="custom-btn btn-analysis">تحليل أداء السهم</button>
                <button class="custom-btn btn-portfolio">إضافة السهم للمحفظة</button>
            </div>
            <img src="{{asset('assets/media/big chart.jpg')}}" alt="صورة جانبية">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadCompanyData();
    });

    function loadCompanyData() {
        const tbody = $('.table tbody');
        const errorMessage = $('.error-message');

        // Show loading state
        tbody.html(''+
            '<tr><td colspan="3" class="text-center loading-state">'+
            '<div class="spinner-border text-primary" role="status">'+
            '<span class="visually-hidden">Loading...</span>'+
            '</div>'+
            '</td></tr>' + ''
        );
        errorMessage.addClass('d-none');

        $.ajax({
            url: '/companies',
            method: 'GET',
            success: function(response) {
                tbody.empty();

                if (response.length === 0) {
                    tbody.html('<tr><td colspan="3" class="text-center">لا توجد بيانات متاحة</td></tr>');
                    return;
                }

                response.forEach(company => {
                    const row = `
                        <tr>
                            <td>${company.company_name}</td>
                            <td>${company.index_name}</td>
                            <td>${company.index_symbol}</td>
                            <td class="d-none">${company.company_id}</td>
                        </tr>
                    `;
                    tbody.append(row);
                });
            },
            error: function(xhr, status, error) {
                errorMessage.text('حدث خطأ أثناء تحميل البيانات. يرجى المحاولة مرة أخرى لاحقاً');
                errorMessage.removeClass('d-none');
                tbody.html('<tr><td colspan="3" class="text-center">حدث خطأ أثناء تحميل البيانات</td></tr>');
            }
        });
    }
    $('#search-input').on('keyup', function() {

        const tbody = $('.table tbody');
        const errorMessage = $('.error-message');

        // Show loading state
        tbody.html(''+
            '<tr><td colspan="3" class="text-center loading-state">'+
            '<div class="spinner-border text-primary" role="status">'+
            '<span class="visually-hidden">Loading...</span>'+
            '</div>'+
            '</td></tr>' + ''
        );
        errorMessage.addClass('d-none');


        var searchQuery = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/search', // replace with your search endpoint
            dataType: 'json',
            data: { query: searchQuery },
            success: function(response) {
                tbody.empty();

                if (response.length === 0) {
                    tbody.html('<tr><td colspan="3" class="text-center">لا توجد بيانات متاحة</td></tr>');
                    return;
                }

                response.forEach(company => {
                    const row = `
                        <tr>
                            <td>${company.company_name}</td>
                            <td>${company.index_name}</td>
                            <td>${company.index_symbol}</td>
                            <td class="d-none">${company.company_id}</td>

                        </tr>
                    `;
                    tbody.append(row);
                });
            },
            error: function(xhr, status, error) {
                errorMessage.text('حدث خطأ أثناء تحميل البيانات. يرجى المحاولة مرة أخرى لاحقاً');
                errorMessage.removeClass('d-none');
                tbody.html('<tr><td colspan="3" class="text-center">حدث خطأ أثناء تحميل البيانات</td></tr>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Delegate the click event to tbody, so it works for dynamically added <tr>
        $('table tbody').on('click', 'tr', function() {
            $('table tbody tr').removeClass('selected-row'); // remove previous
            $(this).addClass('selected-row'); // add to selected

            // Optional debug
            console.log("Selected row text:", $(this).text());
        });

        $('.btn-portfolio').on('click', function () {
            const selectedRow = $('table tbody tr.selected-row');
            if (selectedRow.length === 0) {
                alert("الرجاء اختيار صف واحد");
                return;
            }

            const cells = selectedRow.find('td');
            const company = cells.eq(0).text();
            const sector = cells.eq(1).text();
            const indicator = cells.eq(2).text();
            const id = cells.eq(3).text();

            alert(`تم اختيار:\n${company} - ${sector} - المؤشر: ${indicator} - اي دي: ${id}`);
        });

        $('.btn-analysis').on('click', function () {
            const selectedRow = $('table tbody tr.selected-row');
            if (selectedRow.length === 0) {
                alert("الرجاء اختيار صف واحد");
                return;
            }

            const id = selectedRow.find('td').eq(3).text();
/* <<<<<<<<<<<<<<  ✨ Windsurf Command ⭐ >>>>>>>>>>>>>>>> */
            const loadingSpinner = `
                <div class="position-fixed fixed-top fixed-bottom fixed-right fixed-left d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.5); z-index: 10;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `;
            $('body').append(loadingSpinner);
            $.ajax({
                url: '/stock-analysis',
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    company_id: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        window.location.href = response.redirect_url;
                    }
                },
                complete: function() {
                    $('.position-fixed').remove();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    $('.position-fixed').remove();
                }
            });
/* <<<<<<<<<<  06e7dce0-aade-4044-9434-0290c03b4744  >>>>>>>>>>> */
            // alert(`تحليل السهم:\n${company} - اي دي: ${id}`);
        });
    });
</script>

</body>

</html>
