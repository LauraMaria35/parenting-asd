@extends('layouts.landing')

@section('content')

<style>
    #section1 {
        height: fit-content;
        background-color: white;
        text-align: left;
        width: 650px;
        margin-left: 300px;
    }

    #tv {
        width: 650px;
        height: fit-content;
        background: white;
        border-radius: 0% 0% 0% 0% / 0% 0% 0% 0%;
        box-shadow: 20px 20px rgba(0, 0, 0, .15);
        transition: all .4s ease;
        padding-left: 20px;
        padding-right: 20px;
        color: rgb(96, 43, 100);
        font-family: 'IBM Plex Serif', serif;
    }

    #tv:hover {
        border-radius: 0% 0% 50% 50% / 0% 0% 5% 5%;
        box-shadow: 10px 10px rgba(0, 0, 0, .25);
    }

    #tv h1 {
        font-size: 22px;
    }

    #tv h3 a {
        color: rgb(109, 42, 113);
    }

    #tv h3 a:hover {
        background-color: rgb(142, 67, 146);
        color: white;
        text-decoration: none;
    }

    #tv p {
        color: rgb(109, 42, 113);
        font-size: 17px;
    }

    #tv ul li {
        font-size: 16px;
    }

    footer {
        position: relative;
    }

    @media (max-width: 1000px) {
        #section1 {
            max-width: 1000px;
            margin-left: 100px;
        }
        #section1 h1 {
            font-size: 18px;
        }
        h3{
            font-size: 16px;
        }
    }

    @media (max-width: 600px) {
        #section1 {
            max-width: 600px;
            margin-left: 100px;
        }

        #section1 h1 {
            font-size: 18px;
        }

        h3 {
            font-size: 14px;
        }
    }

    @media (max-width: 500px) {
        #section1 {
            max-width: 500px;
            margin-left: 50px;
        }
    }

    @media (max-width: 400px) {
        #section1 {
            max-width: 400px;
            margin-left: 10px;
        }
    }

    @media (max-width: 300px) {
        #section1 {
            max-width: 300px;
            margin-left: 5px;
        }
    }
</style>
<br>
<main>
    <section id="section1">
        <br>
        <h1>Resources</h1>
        <br>
        <h3><a href="https://www.autismspeaks.org/articles">
                https://www.autismspeaks.org/articles
            </a></h3>
        <br>
        <h3>
            <a href="https://nationalautismresources.com/">https://nationalautismresources.com/</a>
        </h3>
        <br>
        <h3><a href="https://autismsociety.org/resources-by-topic/">https://autismsociety.org/resources-by-topic/</a></h3>
        <br>
        <h3><a href="https://www.autismawareness.com.au/resources">https://www.autismawareness.com.au/resources</a></h3>
        <br>
        <h3><a href="https://www.milestones.org/resources/community-resource-center/categories">https://www.milestones.org/resources/community-resource-center/categories</a></h3>
        <br>
        <h3><a href="https://magazine.medlineplus.gov/topic/autism-spectrum-disorder">https://magazine.medlineplus.gov/topic/autism-spectrum-disorder</a></h3>
        <br>
        <h3><a href="https://www.aacap.org/aacap/Families_and_Youth/Resource_Centers/Autism_Resource_Center/Home.aspx">https://www.aacap.org/aacap/Families_and_Youth/Resource_Centers/Autism_Resource_Center/Home.aspx</a></h3>
        <br>
        <h3><a href="https://www.england.nhs.uk/learning-disabilities/about/useful-autism-resources-and-training/">https://www.england.nhs.uk/learning-disabilities/about/</a></h3>
        <br>
        <h3><a href="https://www.autismresources.co.za/">https://www.autismresources.co.za/</a></h3>
        <br>
        <h3><a href="https://www.autism.org/">https://www.autism.org/</a></h3>
        <br>
        <h3><a href="https://helpautism.ro/autism/?gclid=CjwKCAjws8yUBhA1EiwAi_tpEYOBcYbxzXsZUeHzy9z4zs97uFBeDIYwodZZiDoMyGX8zd5-IvVreBoCxOAQAvD_BwE">https://helpautism.ro/</a></h3>
        <br>
        <h3><a href="https://autismvoice.ro/ce-sanse-reale-de-recuperare-au-copiii-cu-autism-romania-anca-dumitrescu-primul-specialist-roman-acreditat-international-terapia-aba-iti-spune-ce-optiuni-exista/?gclid=CjwKCAjws8yUBhA1EiwAi_tpESxLox3XNDzBjBJpGGpYISsq6gtGO5Dbv6CaCHNoxa57ai-KrpkRsBoCB4IQAvD_BwE">https://autismvoice.ro/</a></h3>
        <br>
    </section>
    @endsection