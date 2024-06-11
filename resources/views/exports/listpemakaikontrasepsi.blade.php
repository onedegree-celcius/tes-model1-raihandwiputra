<!DOCTYPE html>
<html>
<head>
    <title>List Pemakai Kontrasepsi</title>
    <style>
        @media (min-width: 0px) and (max-width: 900px) {
            .main {
                width: 700px !important;
            }
        }

        .main {
            width: 100%;
        }

        .main-header {
            text-align: center;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            margin-bottom: 50px
        }

        .main-table th, 
        .main-table td {
            border: 1px solid #000000;
            padding: 6px;
        }

        .main-table th {
            text-align: center;
        }

        .main-table td {
            text-align: left;
        }

        .main-table th, .approver-table th {
            background-color: #f2f2f2;
        }

        .main-total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        
        .number {
            text-align: right !important;
            white-space: nowrap;
        }

        .approver-table {
            width: 100%;
            border-collapse: collapse;
        }

        .approver-table th, 
        .approver-table td {
            border: 1px solid #ccc;
            padding: 2px;
        }

        .header {
            font-weight: 700;
            font-size: 24px;
            text-align: center
        }
    </style>
</head>
<body>
    <div class="main">
        <table style="width: 100%">
            <thead></thead>
            <tbody>
                <tr>
                    <td colspan="10" style="font-weight: bold;">BADAN KOORDINASI KELUARGA BERENCANA NASIONAL REKAPITULASI PEMAKAI ALAT KONTRASEPSI DI INDONESIA</td>
                </tr>
            </tbody>
        </table>

        <table class="main-table">
            <thead>
                <tr>
                    <th rowspan="2" align="center" valign="center" style="font-weight: bold; border: 1px solid #000000;">No</th>
                    <th rowspan="2" align="center" valign="center" width="150px" style="font-weight: bold; border: 1px solid #000000;">Propinsi</th>
                    <th colspan="{{ count($listKontrasepsi) }}" align="center" valign="center" style="font-weight: bold; border: 1px solid #000000;">Pemakai alat Kontrasepsi</th>
                    <th rowspan="2" align="center" valign="center" style="font-weight: bold; border: 1px solid #000000;">Jumlah</th>
                </tr>
                <tr>
                    @foreach ($listKontrasepsi as $eachdata)
                        <th align="center" valign="center" style="font-weight: bold; border: 1px solid #000000; border: 1px solid #000000;">{{ $eachdata['nama_kontrasepsi'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($listPropinsi as $key => $eachdata)
                    <tr>
                        <td align="center" valign="center" style="border: 1px solid #000000;">{{ $key + 1 }}</td>
                        <td style="border: 1px solid #000000;">{{ $eachdata['nama_propinsi'] }}</td>
                        @foreach ($eachdata['alat_kontrasepsi'] as $eachdata2)
                            <td style="border: 1px solid #000000;">{{ $eachdata2['total'] }}</td>
                        @endforeach
                        <td style="border: 1px solid #000000;">{{ $eachdata['total'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="center" valign="center" style="font-weight: bold; border: 1px solid #000000;">Jumlah</td>
                    @foreach ($listKontrasepsi as $eachdata)
                        <td style="border: 1px solid #000000;">{{ $eachdata['total'] }}</td>
                    @endforeach
                    <td style="border: 1px solid #000000;">{{ array_sum(array_column($listPropinsi->toArray(), 'total')) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>