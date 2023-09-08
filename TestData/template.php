<?php

function template($contentData)
{
    $content =
    $contentData['fullname']."\n".
    $contentData['email']."\n".
    "Visa Officer
High Commission of Canada
Subject: Statement of Purpose for studying in Canada

Dear Sir/Madam,

I would like to take this opportunity to introduce myself as a passionate individual with a strong desire topursue a career in the field of software development.
My name is ".$contentData['fullname'].", and I am a ".$contentData['age']."-year-old student from ".$contentData['applying_country']." 
I have recently completed my Bachelor's Degree in ".$contentData['education']." from ".$contentData['institute']."

During my undergraduate studies, I developed a deep interest in software development and programming.
I have always been fascinated by the way technology can be used to solve complex problems and improvepeople's lives.
To further enhance my knowledge and skills in this field, I have decided to pursue a program of study inCanada.

After extensive research, I have found that the Computer Science program at (Education Institution Name) isthe perfect fit for my academic and career goals.
The program offers a comprehensive curriculum that covers all major concepts of computer science, includingsoftware development, algorithms, and data structures.
The interdisciplinary approach of the program will provide me with a well-rounded understanding of the fieldand prepare me for the challenges of the industry.

Studying at (Education Institution Name) will also give me the opportunity to learn from highly experiencedand skilled faculty members.
The institution is known for its excellent facilities and resources, which will greatly support my academicpursuits.
I believe that the knowledge and skills I will gain from this program will be invaluable in my future careeras a senior software developer.

Canada is renowned for its world-class education system, making it an ideal destination for internationalstudents like myself.
The country offers a safe and peaceful environment, along with excellent healthcare facilities.
Canadian institutes provide a dynamic and innovative learning environment, where students can develop theirtrue potential.
The qualifications obtained from Canadian institutions are highly respected worldwide and will provide astrong foundation for my career.

Furthermore, studying in Canada will expose me to a diverse community of students from different culturesand backgrounds.
This multicultural environment will not only enhance my communication skills but also broaden my horizonsand help me develop a global perspective.

Upon completion of my studies in Canada, my goal is to return to India and contribute to the growth of thesoftware development industry.
India is experiencing rapid growth in the technology sector, and there is a high demand for skilled softwaredevelopers.
I believe that the knowledge and expertise gained from my program in Canada will enable me to make asignificant impact in this industry.

In terms of finances, I have already paid the first year's tuition fee of ".$contentData['tuition_fee']."and have a Guaranteed Investment Certificate (GIC) to cover my living expenses.
Additionally, my family is fully supportive of my education and will provide financial assistance if needed.

Dear Madam/Sir, I assure you that if granted the opportunity to study in Canada, I will abide by all therules and regulations set by the Canadian government, local authorities, and the educational 
institution. I have attached all the necessary documents to support my visa application and kindly requestyou to process it as soon as possible.

Thank you for considering my application. I am grateful for your time and attention.

Sincerely,\n".
    $contentData['fullname'];
    
    return $content;
}
