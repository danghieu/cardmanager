<table width="100%" cellpadding="0" border="1">
    <tbody>
        <tr>
            <td rowspan="2" style="width: 38px;">
            <p style="text-align: center;"> <strong>Số TT</strong></p>
            </td>
            <td rowspan="2" style="width: 312px;">
            <p style="text-align: center;"> <strong>Phương tiện chịu phí đường bộ</strong></p>
            </td>
            <td colspan="3" style="width: 255px;">
            <p style="text-align: center;"> <strong>Mệnh giá </strong> (đồng/vé)</p>
            </td>
        </tr>
        <tr>
            <td style="width: 76px;">
            <p style="text-align: center;"> Vé lượt </p>
            </td>
            <td style="width: 85px;">
            <p style="text-align: center;"> Vé tháng </p>
            </td>
            <td style="width: 94px;">
            <p style="text-align: center;"> Vé quý </p>
            </td>
        </tr>
        @foreach($stationfees as $stationfee )
        <tr>
            <td style="width: 38px;">
            <p style="text-align: center;"> {{$stt++}}</p>
            </td>
            <td style="width: 312px;">
            <p>{{$stationfee->info}}</p>
            </td>
            <td style="width: 76px;">
            <p style="text-align: center;">{{$stationfee->fee}}</p>
            </td>
            <td style="width: 85px;">
            <p style="text-align: center;"> {{$stationfee->fee_month}}</p>
            </td>
            <td style="width: 94px;">
            <p style="text-align: center;"> {{$stationfee->fee_quarter}}</p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>