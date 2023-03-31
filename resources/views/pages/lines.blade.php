<table>

    <tbody>
        <tr>
            <td>Name of the line</td>
            <td>{{ $lineName }}</td>

        </tr>
        <tr>
            <td>Month</td>
            <td>{{ $month.'-'.$year }}</td>

        </tr>
        <tr>
            <td>Total number of tower</td>
            <td>{{ $t_no }}</td>
        </tr>
        <tr>
            <td>Total number of tower visited during the month</td>
            <td>{{ $vis }}</td>
        </tr>
        <tr>
            <td>Percentage of tower visited during the month</td>
            <td>{{ $t_no ? ($vis/$t_no)*100 : 0 }}</td>
        </tr>
        <tr>
            <td>Tower visited during the month not reported during the previous two month</td>
            <td>{{ ($count) }}</td>
        </tr>
        <tr>
            <td>Percentage of tower visited during the month not reported during the previous two month</td>
            <td>{{ $t_no ? ($count/$t_no)*100 : 0 }}</td>
        </tr>
        <tr>
            <td>Tower Reports</td>
        </tr>
        @foreach ($reports as $report)
        <tr>
            <td>Tower</td>
            <td>{{ $report->tower->name }}</td>
        </tr>

        <tr>
            <td>Tower Id</td>
            <td>{{ $report->tower->tower_id }}</td>
        </tr>
        <tr>
            <td>Reporting Coordinates</td>
            <td>{{$report->longitude ."N ".$report->latitude."E"}}</td>
        </tr>
        <tr>
            <td>Reporting distance from tower location</td>
            <td>{{$report->distance($report->longitude, $report->latitude, $report->tower->location->longitude, $report->tower->location->latitude).'metre'}}</td>
        </tr>
            <tr>
                <td>{{ $question->q1 }}</td>
                <td>{{ $report->q1 ? "Yes" : "No" }}</td>
                
            </tr>
            <tr>
                <td>{{ $question->q2 }}</td>
                <td>{{ $report->q2 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q3 }}</td>
                <td>{{ $report->q3 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q4 }}</td>
                <td>{{ $report->q4 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q5 }}</td>
                <td>{{ $report->q5 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q6 }}</td>
                <td>{{ $report->q6 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q7 }}</td>
                <td>{{ $report->q7 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q8 }}</td>
                <td>{{ $report->q8 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q9 }}</td>
                <td>{{ $report->q9 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q10 }}</td>
                <td>{{ $report->q10 ? "Yes" : "No" }}</td>
            </tr>
            <tr>
                <td>{{ $question->q11 }}</td>
                <td>{{ $report->q11 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q12 }}</td>
                <td>{{ $report->q12 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q13 }}</td>
                <td>{{ $report->q13 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q14 }}</td>
                <td>{{ $report->q14 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q15 }}</td>
                <td>{{ $report->q15 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q16 }}</td>
                <td>{{ $report->q16 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q17 }}</td>
                <td>{{ $report->q17 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q18 }}</td>
                <td>{{ $report->q18 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q19 }}</td>
                <td>{{ $report->q19 }}</td>
            </tr>
            <tr>
                <td>{{ $question->q20 }}</td>
                <td>{{ $report->q20 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>