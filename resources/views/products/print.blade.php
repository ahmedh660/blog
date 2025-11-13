<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>فاتورة</title>
    <style>
        body {
            font-family: "Tahoma", Arial, sans-serif;
            direction: rtl;
            margin: 0;
            padding: 0;
        }

        .invoice-wrapper {
            width: 80mm; /* عرض الفاتورة */
            margin: 20px auto; /* تخليها في نص الصفحة */
            padding: 10px;
            border: 1px dashed #000; /* زي فواتير فوري */
            background: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            font-size: 16px;
            margin: 0;
        }

        .info {
            font-size: 13px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            margin-bottom: 10px;
        }

        td, th {
            padding: 5px;
            text-align: right;
        }

        .total {
            font-weight: bold;
            font-size: 14px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }

        .no-print {
            text-align: center;
            margin: 15px;
        }

        @media print {
            .no-print { display: none; }
            body { background: none; }
        }
    </style>
</head>
<body>

<div class="no-print">
    <button onclick="window.print()">🖨️ طباعة</button>
</div>

<div class="invoice-wrapper">
    <div class="header">
        <h2>فاتورة بيع</h2>
    </div>

    <div class="info">
        <p><strong>اسم العميل:</strong> {{ $sale->customer_name }}</p>
        <p><strong>التاريخ:</strong> {{ $sale->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <table>
        <tr>
            <th>المنتج</th>
            <td>{{ optional($sale->product)->name ?? 'محذوف' }}</td>
        </tr>
        <tr>
            <th>الكمية</th>
            <td>{{ $sale->quantity }}</td>
        </tr>
        <tr>
            <th>سعر الوحدة</th>
            <td>{{ optional($sale->product)->sale_price ?? 'N/A' }} جنيه</td>
        </tr>
        <tr class="total">
            <th>الإجمالي</th>
            <td>
                @if($sale->product)
                    {{ $sale->quantity * $sale->product->sale_price }} جنيه
                @else
                    غير متوفر
                @endif
            </td>
        </tr>
    </table>

    @if($sale->upload_image)
        <div style="text-align:center;">
            <p><strong>الإيصال:</strong></p>
            <img src="{{ asset('storage/' . $sale->upload_image) }}" width="150">
        </div>
    @endif

    <div class="footer">
        <p>شكراً لزيارتكم 🌹</p>
    </div>
</div>

</body>
</html>
