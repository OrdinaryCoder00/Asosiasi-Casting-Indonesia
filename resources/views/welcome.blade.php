<x-layout.layout-home>
    <section id="home">
        <x-home.banner />

    </section>
    <section id="our-team">
        <x-home.ourteam :team="$team" />
    </section>

    <section id="poster">
        <x-home.film :film="$film" />
    </section>

    <section id="news">
        <x-home.news :news="$news" />
    </section>
</x-layout.layout-home>
