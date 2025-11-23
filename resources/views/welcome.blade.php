<x-layout.layout-home>
    <x-home.banner />

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
