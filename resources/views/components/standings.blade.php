<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <section>
    <h2>Standings</h2>
    <table>
        <thead>
        <tr>
            <td></td>
            <th scope="col">Team</th>
            <th scope="col">Games</th>
            <th scope="col">Points</th>
            <th scope="col">Wins</th>
            <th scope="col">Losses</th>
            <th scope="col">Golden Snitch</th>
            <th scope="col">Goals</th>
        </tr> 
        </thead>
        <tbody>
            
            @foreach($teams as $team)
        <tr>
            <td>{{$team->id}}</td>
            <th scope="row">@can('add-team')<a href="/team/{{$team->slug}}/edit">{{$team->name}}</a>@endcan @cannot('add-team'){{$team->name}}@endcannot</th>
            <td>{{$team->team_part}}</td>
            <td>{{$team->team_points}}</td>
            <td>{{$team->team_wins}}</td>
            <td>{{$team->team_losses}}</td>
            <td>{{$team->team_gs}}</td>
            <td>{{$team->team_g}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</section>
</div>