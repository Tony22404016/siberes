<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status Pesanan</title>
    <style>
        /* Reset dan base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff; /* Putih */
            color: #001F3F; /* Navy biru */
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff; /* Putih */
            border: 2px solid #001F3F; /* Navy biru */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 31, 63, 0.1); /* Shadow halus dengan navy */
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #001F3F; /* Navy biru */
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #001F3F; /* Navy biru */
            font-weight: 600;
            font-size: 16px;
        }

        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #001F3F; /* Navy biru */
            border-radius: 8px;
            background-color: #ffffff; /* Putih */
            color: #001F3F; /* Navy biru */
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus {
            outline: none;
            border-color: #003366; /* Navy lebih gelap untuk focus */
            box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
        }

        select option {
            background-color: #ffffff; /* Putih */
            color: #001F3F; /* Navy biru */
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #001F3F; /* Navy biru */
            color: #ffffff; /* Putih */
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #003366; /* Navy lebih gelap */
        }

        button:active {
            transform: translateY(1px);
        }

        /* Responsif untuk mobile */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                margin-top: 20px;
                padding: 20px;
                border-radius: 8px;
            }

            h2 {
                font-size: 20px;
                margin-bottom: 20px;
            }

            select,
            button {
                font-size: 16px; /* Pastikan readable di mobile */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Status Pesanan</h2>
        <form action="{{route('order.update',$order->order_id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status Pesanan:</label>
                <select id="status" name="status" required>
                    <option value="">Pilih status baru</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
            <button type="submit">Update Status</button>
        </form>
    </div>
</body>
</html>