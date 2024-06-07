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
                <td style="font-weight:600; padding: 0px;">{{ $period }}</td>
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
            <tr>
                <td>
                    <table cellpadding="5" cellspacing="0" class="borderbox" width="100%">
                        <tr>
                            <th bgcolor="#4A86E8" style="font-size: 14px; color: #fff;">Quarter</th>
                            <th bgcolor="#4A86E8" style="font-size: 14px; color: #fff;">
                                <span style="display:block;">1</span>
                                9/8/21 - 11/12/21
                            </th>
                            <th bgcolor="#4A86E8" style="font-size: 14px; color: #fff;">
                                <span style="display:block;">2</span>
                                11/15/21 - 1/28/22
                            </th>
                            <th bgcolor="#4A86E8" style="font-size: 14px; color: #fff;">
                                <span style="display:block;">3</span>
                                1/31/22 - 4/1/22
                            </th>
                            <th bgcolor="#4A86E8" style="font-size: 14px; color: #fff;">
                                <span style="display:block;">4</span>
                                4/4/22 - 6/10/22
                            </th>
                        </tr>
                        <tr>
                            <td align="center" style="font-size: 14px;">Days Absent</td>
                            <td align="center" style="font-size: 14px;">0</td>
                            <td align="center" style="font-size: 14px;">0</td>
                            <td align="center" style="font-size: 14px;">0</td>
                            <td align="center" style="font-size: 14px;">0</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="demo_data">
        <table cellpadding="2" cellspacing="0" width="100%" class="borderbox ">
            <tr align="left">
                <th width="40">Goal # </th>
                <th width="130">Type</th>
                <th>Goal:</th>
            </tr>
            @php 
            $counter = 1;
            @endphp
            @foreach ($data as $task)
                <tr align="left">
                    <td>{{ $counter }}</td>
                    <td>{{ ($task->skill && $task->skill->skill_name)?$task->skill->skill_name:''}}</td>
                    <td>{{ $task->task_name }}</td>
                </tr> 
                @php 
                $counter = $counter+1;
                @endphp 
            @endforeach
        </table>
    </div>

    <div class="summary">
        <table cellpadding="5" cellspacing="0" width="100%">
            <tr>
                <td style="font-weight:600; font-size: 22px;">Summary Notes:</td>
            </tr>
            <tr>
                <td>{{ $kid->summary }}</td>
            </tr>
        </table>
    </div>

    <div class="parent_data">
        <table cellpadding="2" cellspacing="0" width="100%" style="margin-top:50px; margin-bottom:200px;">
            <tr>
                <td width='120'>
                    <hr/>
                    Parent Name
                </td>
                <td >
                </td>
               
                <td width='120'>
                    <hr/>
                    Date
                </td>
            </tr>
            <tr>
                <td style="padding-top: 100px" width='120'>
                    <hr/>
                    Teacher Name
                </td>
                <td >
                </td>
                <td style="padding-top: 100px" width='120'>
                    <hr/>
                    Date
                </td>
            </tr>
        </table>
    </div>


</body>
</html>