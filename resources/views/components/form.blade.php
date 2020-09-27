<div>
    <!-- Be present above all else. - Naval Ravikant -->
    <form action="/" method="post">
    @csrf
        <label for="match-date">Date du match</label>
        <input type="text" id="match-date" name="match-date">
        <br>
        <label for="home-team">Équipe à domicile</label>
        <select name="home-team" id="home-team">
        @foreach($teams as $team)
        <option value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
            
        </select>
        <label for="home-team-unlisted">Équipe non listée&nbsp;?</label>
        <input type="text" name="home-team-unlisted" id="home-team-unlisted">
        <br>
        <label for="home-team-goals">Goals de l’équipe à domicile</label>
        <input type="text" id="home-team-goals" name="home-team-goals">
        <br>
        <label for="request('home-team')">Équipe visiteuse</label>
        <select name="away-team" id="away-team">
        @foreach($teams as $team)
        <option value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
        </select>
        <label for="away-team-unlisted">Équipe non listée&nbsp;?</label>
        <input type="text" name="away-team-unlisted" id="away-team-unlisted">
        <br>
        <label for="request('home-team')">Goals de l’équipe visiteuse</label>
        <input type="text" id="away-team-goals" name="away-team-goals">
        <br>
        <input type="submit" value="Ajouter ce match">
    </form>
</div>