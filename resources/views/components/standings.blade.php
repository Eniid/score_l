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
            <th scope="col">Draws</th>
            <th scope="col">GF</th>
            <th scope="col">GA</th>
            <th scope="col">GD</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach($teams as $team)
        <tr>
            <td>{{$team->id}}</td>
            <th scope="row">{{$team->name}}</th>
            <td>4</td>
            <td>12</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>10</td>
            <td>0</td>
            <td>10</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</section>
</div>