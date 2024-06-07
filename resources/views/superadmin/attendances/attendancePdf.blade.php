<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"> --}}
    <title></title>
    <style type="text/css">
    * {
        font-family: 'Poppins', sans-serif;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        font-family: 'Poppins', sans-serif;
        color: #000;
        font-size: 14px;
        line-height: normal;
    }

    @page {
        /* size: a4 portrait; */
        margin-left: 0.2in;
        margin-right: 0.2in;
        margin-top: 0.2in;
    }

    .borderbox tr>td,
    .borderbox tr>th {
        padding: 2px 10px;
        border: 1px solid #cdcdcd;
        border-collapse: collapse;
        font-size: 14px;
    }
/* 
    @media print {
        .break {
            page-break-after: always;
        }
    } */
    </style>
</head>

<body>
    <table cellpadding="5" cellspacing="5" border="0" width="100%" align="center">
        <thead>
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" align="right" border="0">
                        <tr>
                            <td valign="top"><img src="http://3.22.65.185/super_school/public/assets/image/logo.png" width="100"></td>
                            <td>
                                <table cellpadding="0" cellspacing="0" style="padding-left: 10px;">
                                    <tr>
                                        <td style="font-size: 20px; line-height: 24px; font-weight:600; text-transform: uppercase; ">Super <br /> School</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px; line-height: 14px; font-style: italic; font-weight:500;">Masked Perfection</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px; line-height: 14px; font-weight:500;">4343 W Sunrise Blvd <br /> Plantation, FL 33313</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <td style="font-size: 18px; line-height: 18px; font-weight:600; padding: 0px;">Super School</td>
            </tr>
            <tr align="center">
                <td style="font-weight:600; padding: 0px;">{{ $year }}</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="5" cellspacing="0" border="0" width="100%" class="borderbox">
                        <tr>
                            <td style="font-weight:600;">Candidate: </td>
                            <td>{{ $kid->name }}</td>
                            <td style="font-weight:600;">Interviewer: </td>
                            <td> {{ ($kid->assignedTeacher && $kid->assignedTeacher->name)?$kid->assignedTeacher->name:'' }} </td>
                        </tr>
                        <tr>
                            <td style="font-weight:600; text-transform: uppercase;">dob: </td>
                            <td>{{\Carbon\Carbon::parse($kid->dob)->format('M d, Y')}}</td>
                            <td style="font-weight:600;">Date: </td>
                            <td>{{ today()->format('M d, Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="demo_data">
        <table cellpadding="2" cellspacing="0" width="100%" class="borderbox " style="padding-right:40px; padding-top:40px; font-size: 12px;">
            <tr align="left">
                <th class="text-left" style="width: 15px; font-size: 12px;">Months</th>
                <th style="font-size: 12px;">1</th>
                <th style="font-size: 12px;">2</th>
                <th style="font-size: 12px;">3</th>
                <th style="font-size: 12px;">4</th>
                <th style="font-size: 12px;">5</th>
                <th style="font-size: 12px;">6</th>
                <th style="font-size: 12px;">7</th>
                <th style="font-size: 12px;">8</th>
                <th style="font-size: 12px;">9</th>
                <th style="font-size: 12px;">10</th>
                <th style="font-size: 12px;">11</th>
                <th style="font-size: 12px;">12</th>
                <th style="font-size: 12px;">13</th>
                <th style="font-size: 12px;">14</th>
                <th style="font-size: 12px;">15</th>
                <th style="font-size: 12px;">16</th>
                <th style="font-size: 12px;">17</th>
                <th style="font-size: 12px;">18</th>
                <th style="font-size: 12px;">19</th>
                <th style="font-size: 12px;">20</th>
                <th style="font-size: 12px;">21</th>
                <th style="font-size: 12px;">22</th>
                <th style="font-size: 12px;">23</th>
                <th style="font-size: 12px;">24</th>
                <th style="font-size: 12px;">25</th>
                <th style="font-size: 12px;">26</th>
                <th style="font-size: 12px;">27</th>
                <th style="font-size: 12px;">28</th>
                <th style="font-size: 12px;">29</th>
                <th style="font-size: 12px;">30</th>
                <th style="font-size: 12px;">31</th>
            </tr>
            @php 
            $counter = 1;
            @endphp
            @foreach($attendances as $attendance)
            <tr>
                <td class="text-left" style="width: 15px; font-size: 14px;">{{ $attendance['month'] }}</td>
                    @foreach($attendance['monthAtt'] as $att)
                        @if($att['status']==1)
                            <td style="font-size: 12px;"><img src="http://3.22.65.185/super_school/public/assets/image/check.png"width="9" height="7"></td>
                        @elseif($att['status']===0)
                            <td style="font-size: 12px;"><img src="http://3.22.65.185/super_school/public/assets/image/close.png" width="7" height="7"></td>
                        @else
                            <td style="font-size: 12px;">-</td>
                        @endif
                    @endforeach
                    @php 
                    $counter = $counter+1;
                    @endphp
                </td>
            </tr>
            @endforeach
            <tr>
                <td  colspan="4" style="padding-top:40px; border:none;">
                    <hr/>
                    Parent Name
                </td>
                <td colspan="24" style="padding-top:40px; border:none;">
                </td>
                
                <td  colspan="4" style="padding-top:40px; border:none;">
                    <hr/>
                    Date
                </td>
            </tr>
            <tr>
                <td style="padding-top:40px; border:none;"  colspan="4">
                    <hr/>
                    Teacher Name
                </td>
                <td colspan="24" style="border:none;">
                </td>
                <td  colspan="4" style="border:none; padding-top: 40px">
                    <hr/>
                    Date
                </td>
            </tr>
        </table>
    </div>


</body>
</html>