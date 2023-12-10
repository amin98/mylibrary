<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Genre;
use App\Models\Loan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//      Genre::factory(10)->create();
//      Role::factory(1)->create();

        Role::create([
            'title' => 'admin'
        ]);

        Role::create([
            'title' => 'member'
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Pablo J.',
            'email' => 'pablo@test.com',
            'password' => Hash::make('pablo123'),
            'street' => 'Kanaalstraat',
            'house_number' => 3,
            'postal_code' => '5986 BE',
            'city' => 'Beringe',
            'country' => 'Nederland',
            'phone' => '0639173377'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Maria J.',
            'email' => 'maria@test.com',
            'password' => Hash::make('maria123'),
            'street' => 'Kanaalstraat',
            'house_number' => 5,
            'postal_code' => '5986 BE',
            'city' => 'Beringe',
            'country' => 'Nederland',
            'phone' => '0639173377'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Joost M.',
            'email' => 'joost@test.com',
            'password' => Hash::make('joost123'),
            'street' => 'Maisstraat',
            'house_number' => 9,
            'postal_code' => '5234 BE',
            'city' => 'Amsterdam',
            'country' => 'Nederland',
            'phone' => '0639173377'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Paul R.',
            'email' => 'paul@test.com',
            'password' => Hash::make('paul123'),
            'street' => 'Maisstraat',
            'house_number' => 9,
            'postal_code' => '5234 BE',
            'city' => 'Amsterdam',
            'country' => 'Nederland',
            'phone' => '0639173377'
        ]);

        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'blurb' => 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives,
             who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that
              tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and
               takes him to his new home, Hogwarts School of Witchcraft and Wizardry.',
            'image' => 'images/harry-potter-and-the-sorcerers-stone.jpg',
        ]);

        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Chamber of Secrets',
            'blurb' => 'Ever since Harry Potter had come home for the summer, the Dursleys had been so mean and hideous that
             all Harry wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he’s packing
             his bags, Harry receives a warning from a strange impish creature who says that if Harry returns to Hogwarts, disaster will strike.',
            'image' => 'images/harry-potter-and-the-chamber-of-secrets.jpg',
        ]);

        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Prisoner of Azkaban',
            'blurb' => 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black.
             Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord,
              Voldemort. Now he has escaped, leaving only two clues as to where he might be headed: Harry Potter\'s defeat
               of You-Know-Who was Black\'s downfall as well. And the Azkaban guards heard Black muttering in his sleep,
               "He\'s at Hogwarts . . . he\'s at Hogwarts."',
            'image' => 'images/harry-potter-and-the-prisoner-of-azkaban.jpg',
        ]);

        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Goblet of Fire',
            'blurb' => 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to
             get away from the pernicious Dursleys and go to the International Quidditch Cup with Hermione, Ron, and the
              Weasleys. He wants to dream about Cho Chang, his crush (and maybe do more than dream). He wants to find out
               about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other
                rival schools of magic, and a competition that hasn\'t happened for hundreds of years. He wants to be a normal,
                 fourteen-year-old wizard. But unfortunately for Harry Potter, he\'s not normal - even by wizarding standards.',
            'image' => 'images/harry-potter-and-the-goblet-of-fire.jpg',
        ]);

        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Order of the Phoenix',
            'blurb' => 'There is a door at the end of a silent corridor. And it’s haunting Harry Pottter’s dreams.
            Why else would he be waking in the middle of the night, screaming in terror? Harry has a lot on his mind for
            this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey;
             a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams.
              But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named - a threat that neither the
               magical government nor the authorities at Hogwarts can stop.',
            'image' => 'images/harry-potter-and-the-order-of-the-phoenix.jpg',
        ]);


        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Half-Blood Prince',
            'blurb' => 'The war against Voldemort is not going well; even Muggle governments are noticing. Ron scans the
             obituary pages of the Daily Prophet, looking for familiar names. Dumbledore is absent from Hogwarts for long
              stretches of time, and the Order of the Phoenix has already suffered losses. And yet . . . As in all wars,
               life goes on. The Weasley twins expand their business. Sixth-year students learn to Apparate - and lose a
                few eyebrows in the process. Teenagers flirt and fight and fall in love. Classes are never straightforward,
                 through Harry receives some extraordinary help from the mysterious Half-Blood Prince.',
            'image' => 'images/harry-potter-and-the-half-blood-prince.jpg',
        ]);


        Book::create([
            'author_id' => 1,
            'genre_id' => 4,
            'title' => 'Harry Potter and the Deathly Hallows',
            'blurb' => 'It\'s no longer safe for Harry at Hogwarts, so he and his best friends, Ron and Hermione, are on
            the run. Professor Dumbledore has given them clues about what they need to do to defeat the dark wizard,
             Lord Voldemort, once and for all, but it\'s up to them to figure out what these hints and suggestions really
              mean. Their cross-country odyssey has them searching desperately for the answers, while evading capture or
              death at every turn. At the same time, their friendship, fortitude, and sense of right and wrong are tested
              in ways they never could have imagined. The ultimate battle between good and evil that closes out this final
               chapter of the epic series takes place where Harry\'s Wizarding life began: at Hogwarts. The satisfying
               conclusion offers shocking last-minute twists, incredible acts of courage, powerful new forms of magic,
                and the resolution of many mysteries. Above all, this intense, cathartic book serves as a clear statement
                of the message at the heart of the Harry Potter series: that choice matters much more than destiny,
                and that love will always triumph over death.',
            'image' => 'images/harry-potter-and-the-deathly-hallows.jpg',
        ]);

        Book::create([
            'author_id' => 6,
            'genre_id' => 4,
            'title' => 'Alice in Wonderland',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/alice-in-wonderland.jpg',
        ]);

        Book::create([
            'author_id' => 6,
            'genre_id' => 4,
            'title' => 'The Nursery "Alice"',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/the-nursery-alice.jpg',
        ]);

        Book::create([
            'author_id' => 6,
            'genre_id' => 4,
            'title' => 'Sylvie and Bruno',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/sylvie-and-bruno.jpg',
        ]);

        Book::create([
            'author_id' => 6,
            'genre_id' => 7,
            'title' => 'Through the Looking-Glass',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/through-the-looking-glass.jpg',
        ]);

        Book::create([
            'author_id' => 6,
            'genre_id' => 7,
            'title' => 'The Walrus and the Carpenter',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/the-walrus-and-the-carpenter.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 6,
            'title' => 'The Adventures of Tom Sawyer',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/the-adventures-of-tom-sawyer.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 6,
            'title' => 'The Adventures of Huckleberry Finn',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/the-adventures-of-huckleberry-finn.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 10,
            'title' => 'A Connecticut Yankee in King Arthur\'s Court',
            'blurb' => 'The Hunting of the Snark, subtitled An Agony in 8 Fits, is a poem by the English writer Lewis Carroll.
            It is typically categorised as a nonsense poem. Written between 1874 and 1876, it borrows the setting, some creatures,
            and eight portmanteau words from Carroll\'s earlier poem "Jabberwocky" in his children\'s novel Through the Looking-Glass (1871).
            The narrative follows a crew of ten trying to hunt the Snark, a creature which may turn out to be a highly dangerous Boojum.
            The only crewmember to find the Snark quietly vanishes, leading the narrator to explain that the Snark was a Boojum after all.
            The poem is dedicated to young Gertrude Chataway, whom Carroll met at the English seaside town Sandown in the Isle of Wight in 1875.
            Included with many copies of the first edition of the poem was Carroll\'s religious tract, An Easter Greeting to Every Child Who Loves "Alice".',
            'image' => 'images/a-connecticut-yankee-in-king-arthurs-court.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'Oliver Twist',
            'blurb' => 'A gripping portrayal of London\'s dark criminal underbelly, published in Penguin Classics with an introduction by Philip Horne.
            The story of Oliver Twist - orphaned, and set upon by evil and adversity from his first breath - shocked readers when it was published.
            After running away from the workhouse and pompous beadle Mr Bumble, Oliver finds himself lured into a den of thieves peopled by vivid and
            memorable characters - the Artful Dodger, vicious burglar Bill Sikes, his dog Bull\'s Eye, and prostitute Nancy, all watched over by cunning
            master-thief Fagin. Combining elements of Gothic Romance, the Newgate Novel and popular melodrama, Dickens created an entirely new kind of fiction,
            scathing in its indictment of a cruel society, and pervaded by an unforgettable sense of threat and mystery.',
            'image' => 'images/oliver-twist.jpg',
        ]);

        Book::create([
            'author_id' => 9,
            'genre_id' => 4,
            'title' => 'Pride and Prejudice',
            'blurb' => 'Pride and Prejudice is an 1813 novel of manners written by Jane Austen.
            Though it is mostly called a romantic novel, it is also a satire.This is not an exhaustive
            list (that list would be hundreds of editions long because wow do people love their Pride and Prejudice),
            but it is a round up of some of the editions I found most lovely or interesting. So enjoy—and try not to buy them all!',
            'image' => 'images/pride-and-prejudice.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'David Copperfield',
            'blurb' => 'The Personal History, Adventures, Experience and Observation of David Copperfield the Younger
            of Blunderstone Rookery (Which He Never Meant to Publish on Any Account), commonly known as David Copperfield,
             is a novel in the bildungsroman genre by Charles Dickens, narrated by the eponymous David Copperfield,
             detailing his adventures in his journey from infancy to maturity. It was first published as a serial in 1849 and 1850,
             and as a book in 1850. David Copperfield is also an autobiographical novel: "a very complicated weaving of truth and invention",
             with events following Dickens\'s own life. Of the books he wrote, it was his favourite. Called "the triumph of the art of Dickens",
             it marks a turning point in his work, separating the novels of youth and those of maturity.
            At first glance, the work is modelled on 18th-century "personal histories" that were very popular, like Henry Fielding\'s J
            oseph Andrews or Tom Jones, but David Copperfield is a more carefully structured work.',
            'image' => 'images/david-copperfield.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'Great Expectations',
            'blurb' => 'In what may be Dickens\'s best novel, humble, orphaned Pip is apprenticed to the dirty work of the
            forge but dares to dream of becoming a gentleman — and one day, under sudden and enigmatic circumstances, he finds
             himself in possession of "great expectations." In this gripping tale of crime and guilt, revenge and reward,
             the compelling characters include Magwitch, the fearful and fearsome convict; Estella, whose beauty is excelled only by her haughtiness;
             and the embittered Miss Havisham, an eccentric jilted bride',
            'image' => 'images/great-expectations.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'A Tale of Two Cities',
            'blurb' => 'A Tale of Two Cities is Charles Dickens’s great historical novel, set against the violent upheaval
             of the French Revolution. The most famous and perhaps the most popular of his works, it compresses an event of immense
             complexity to the scale of a family history, with a cast of characters that includes a bloodthirsty ogress and an antihero
             as believably flawed as any in modern fiction. Though the least typical of the author’s novels, A Tale of Two Cities still
             underscores many of his enduring themes—imprisonment, injustice, social anarchy, resurrection, and the renunciation that fosters renewal.',
            'image' => 'images/a-tale-of-two-cities.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'A Christmas Carol',
            'blurb' => 'If I had my way, every idiot who goes around with Merry Christmas on his lips, would be boiled with his own pudding,
             and buried with a stake of holly through his heart. Merry Christmas? Bah humbug!\'Introduction and Afterword by Joe Wheeler
             To bitter, miserly Ebenezer Scrooge, Christmas is just another day. But all that changes when the ghost of his long-dead business partner
             appears, warning Scrooge to change his ways before it\'s too late.
             Part of the Focus on the Family Great Stories collection, this abridged edition features an in-depth introduction
              and discussion questions by Joe Wheeler to provide greater understanding for today\'s reader .
              "A Christmas Carol" captures the heart of the holidays like no other novel .,',
            'image' => 'images/a-christmas-carol.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'Hard Times',
            'blurb' => 'My satire is against those who see figures and averages, and nothing else," proclaimed Charles Dickens in explaining
             the theme of this classic novel. Published in 1854, the story concerns one Thomas Gradgrind, a "fanatic of the demonstrable fact,"
             who raises his children, Tom and Louisa, in a stifling and arid atmosphere of grim practicality.
             Without a moral compass to guide them, the children sink into lives of desperation and despair, played out against the grim
             background of Coketown, a wretched community shadowed by an industrial behemoth. Louisa falls into a loveless marriage with Josiah Bouderby,
             a vulgar banker, while the unscrupulous Tom, totally lacking in principle, becomes a thief who frames an innocent man for his crime.
             Witnessing the degradation and downfall of his children, Gradgrind realizes that his own misguided principles have ruined their lives.',
            'image' => 'images/hard-times.jpg',
        ]);

        Book::create([
            'author_id' => 2,
            'genre_id' => 11,
            'title' => 'Bleak House',
            'blurb' => 'Bleak House opens in the twilight of foggy London, where fog grips the city most densely in the Court of Chancery.
             The obscure case of Jarndyce and Jarndyce, in which an inheritance is gradually devoured by legal costs, the romance of Esther
              Summerson and the secrets of her origin, the sleuthing of Detective Inspector Bucket and the fate of Jo the crossing-sweeper,
              these are some of the lives Dickens invokes to portray London society, rich and poor, as no other novelist has done. Bleak House,
               in its atmosphere, symbolism and magnificent bleak comedy, is often regarded as the best of Dickens. A \'great Victorian novel
            \', it is so inventive in its competing plots and styles that it eludes interpretation.',
            'image' => 'images/bleak-house.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 12,
            'title' => 'The Complete Short Stories of Mark Twain',
            'blurb' => 'For deft plotting, riotous inventiveness, unforgettable characters, and language that brilliantly captures the lively
             rhythms of American speech, no American writer comes close to Mark Twain. This sparkling anthology covers the entire span of Twain’s
             inimitable yarn-spinning, from his early broad comedy to the biting satire of his later years. Every one of his sixty stories is here:
             ranging from the frontier humor of “The Celebrated Jumping Frog of Calaveras County,” to the bitter vision of humankind in “The Man That
              Corrupted Hadleyburg,” to the delightful hilarity of “Is He Living or Is He Dead?” Surging with Twain’s ebullient wit and penetrating
               insight into the follies of human nature, this volume is a vibrant summation of the career of–in the words of H. L. Mencken–“the father
                of our national literature.',
            'image' => 'images/the-complete-short-stories-of-mark-twain.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 12,
            'title' => 'Pudd\'nhead Wilson',
            'blurb' => 'At the beginning of Pudd\'nhead Wilson a young slave woman, fearing for her infant son\'s life, exchanges her light-skinned child
             with her master\'s.  From this rather simple premise Mark Twain fashioned one of his most entertaining, funny, yet biting novels.
               On its surface, Pudd\'nhead Wilson possesses all the elements of an engrossing nineteenth-century mystery:  reversed identities, a horrible crime,
                an eccentric detective, a suspenseful courtroom drama, and a surprising, unusual solution.  Yet it is not a mystery novel.  Seething with the
                undercurrents of antebellum southern culture, the book is a savage indictment in which the real criminal is society, and racial prejudice
                 and slavery are the crimes.  Written in 1894, Pudd\'nhead Wilson glistens with characteristic Twain humor, with suspense, and with pointed irony:
                   a gem among the author\'s later works.',
            'image' => 'images/puddnhead-wilson.jpg',
        ]);

        Book::create([
            'author_id' => 7,
            'genre_id' => 6,
            'title' => 'The Innocents Abroad',
            'blurb' => 'The Innocents Abroad, or The New Pilgrims\' Progress is a travel book by American author Mark Twain published in 1869 which humorously
             chronicles what Twain called his "Great Pleasure Excursion" on board the chartered vessel Quaker City (formerly USS Quaker City) through Europe and
              the Holy Land with a group of American travelers in 1867. It was the best-selling of Twain\'s works during his lifetime, as well as one of the
               best-selling travel books of all time.',
            'image' => 'images/the-innocents-abroad.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'Fauna',
            'blurb' => 'Which is sweeter—tender, yearned-for love, or revenge that has waited a lifetime? In her veins mingled the blood of noble African chiefs
             and fiery Irish poets. Sold into cruel slavery, beaten by a harsh mistress, she escaped into a dazzling world of elegance, wealth and power.
              All London would praise her intelligence and unmatched beauty ...all men would crave to possess her. But nothing could ease the searing pain in her
              heart—nothing but vengeance on the only man she had ever loved!',
            'image' => 'images/fauna.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'The Cyprus Love Affair',
            'blurb' => 'Pretty young Lucie Gresham, a secretary at the British Embassy in Cairo, was desperately anxious to visit the beautiful island of Cyprus,
            and she did so taking a job as companion to the mother of rich shipping magnate Adrian Ollivent. Lucie finds the island as enchanting as she had hoped
            and Mrs Ollivent a pleasant and kindly old lady but also finds herself falling in love with Adrian. He is not a happy man and displays little affection
            towards her so Lucie determines to discover what has made him this way. She finds much pain and unhappiness has to be endured before the complete truth is finally exposed.',
            'image' => 'images/the-cyprus-love-affair.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'I Should Have Known',
            'blurb' => 'Shy Shelley Bray was a young teacher from London, who was appointed governess of the two young children by Esmond Torrington in Monte Carlo.
             She thought that she would be in complete charge of the children during their father\'s absence, until she met her employer\'s sister, a wheel-chair
             invalid. She had received no warning of her existence. Shelley quickly realized that she would be challenged and frustrated in her efforts to win her new pupils\'
              love and trust, as she was forbidden to mention their beautiful mother. Worst of all, she was constantly made to feel small in front of her new employer,
               a world-famous symphony director - and for some strange reason that mattered terribly to Shelley. Soon she had fallen desperatly in love with Esmond and
                she found herself tossed suddenly into a maelstrom of passion and jealousy, and only her commonsense and humour could saved the family from ruin.',
            'image' => 'images/i-should-have-known.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'Gold for the Gay Masters',
            'blurb' => 'Fauna is an exquisitely beautiful quadroon, in her veins mingled the blood of noble African chiefs and fiery Irish poets. Sold into cruel
             slavery in the West Indies, she is rescued by Lord Pumphret, a noted English dandy of the Georgian period. But Fauna is taken to England only to become
             the plaything and victim of those who make up Pumphret\'s circle - until she meets, and in the end marries, the noble French Marquis de Chartellet.
              As Madame la Marquise, all London would praise her intelligence and unmatched beauty... all men would crave to possess her. Once beaten by a harsh
              mistress, she escaped and rises from the slave block to make men her slaves into a dazzling world of elegance, wealth and power. But nothing could ease
              the searing pain in her heart--nothing but vengeance on the only man she had ever loved, who mistreated her! Which is sweeter--tender, yearned-for love,
               or revenge that has waited a lifetime?',
            'image' => 'images/gold-for-the-gay-masters.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'Bride of Doom',
            'blurb' => 'Fauna, the beautiful quarter-caste slave-girl, had a daughter Fleur Roddney comes to the fore. As alluring and fatally captivating as her mother, Fleur \'s
             life would never be a life of ease... This is Fleur\'s story. The story of an arranged marriage to the forbidding Baron of Cadlington, of her love for the young artist
              Peveril, of the darkly-predicted black heir who is born to her, of her fiery attempts to find escape, revenge - and fulfilment, of the restless urges that burn in her
               fated blood... Here at last -- from the hidden annals of history\'s most corrupt and scandalous era -- is the undiluted story of the tomrented loves and hates of the
                beautiful, long-limbed Fleur ... And the Baron St. Cheviot...',
            'image' => 'images/bride-of-doom.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'Venetian Rhapsody',
            'blurb' => 'Twenty years of age, Katherine Shaw arrives in Venice, to be governess for the Marchesa Voccheroni\'s daughter. For Katherine, it was a fairy tale come true -
             Venice is the most romantic city in the world. From a quiet English upbringing, Katherine suddenly finds herself plunged into a gay whirl of fashion, riches and aristocracy.
              Even more thrilling, Katherine was falling in love with Renato, the Marchesa\'s son. Violante, the beautiful millionairess, wanted Renato too - and she had a secret hold
              on him, for Renato\'s mother was gambling the family fortune away. If only Katherine could show him she had something more precious than wealth...',
            'image' => 'images/venetian-rhapsody.jpg',
        ]);

        Book::create([
            'author_id' => 4,
            'genre_id' => 2,
            'title' => 'House of the Seventh Cross',
            'blurb' => 'In Palma on vacation, Rosamund Lowe accepted a lift from a stranger named Rune le Motte and was involved in a smash-up. After the auto accident, a fragile blond girl
             regained consciousness in an unfamiliar house, and gazed upon by mysterious faces. Kept as a virtual prisoner in the strange house, it was her home and she was Rune le Motte
             the heiress, or so Mark Jervis told her. But Mark\'s motives were suspect for her, she is confused by the sinister atmosphere that prevailed and is almost forced into marriage
             against her will. When she meets a destitute singer for whom she conceives a violent atraction, she found herself turning to his hated enemy, Julian Marsh for support.
              Her memory may have been shattered, but not her strength nor her ability to love. And now the only solutions to the emotional triangle depended on whether she was really Rune
              le Motte or the girl who impersonate her. Only when she fully recovers her memory that she is able to piece the puzzle.',
            'image' => 'images/house-of-the-seventh-cross.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'And Then There Were None',
            'blurb' => 'First, there were ten—a curious assortment of strangers summoned as weekend guests to a little private island off the coast of Devon. Their host, an eccentric
             millionaire unknown to all of them, is nowhere to be found. All that the guests have in common is a wicked past they\'re unwilling to reveal—and a secret that will seal their fate.
              For each has been marked for murder. A famous nursery rhyme is framed and hung in every room of the mansion:"Ten little boys went out to dine; One choked his little self
               and then there were nine. Nine little boys sat up very late; One overslept himself and then there were eight. Eight little boys traveling in Devon; One said he\'d stay there
               then there were seven. Seven little boys chopping up sticks; One chopped himself in half and then there were six. Six little boys playing with a hive; A bumblebee stung
               one and then there were five. Five little boys going in for law; One got in Chancery and then there were four. Four little boys going out to sea; A red herring swallowed
                one and then there were three. Three little boys walking in the zoo; A big bear hugged one and then there were two. Two little boys sitting in the sun; One got frizzled
                up and then there was one. One little boy left all alone; He went out and hanged himself and then there were none."',
            'image' => 'images/and-then-there-were-none.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'Murder on the Orient Express',
            'blurb' => 'Just after midnight, a snowdrift stops the Orient Express in its tracks. The luxurious train is surprisingly full for the time of the year, but by the morning
            it is one passenger fewer. An American tycoon lies dead in his compartment, stabbed a dozen times, his door locked from the inside. And with a killer in their midst,
             detective Hercule Poirot must identify the murderer—in case he or she decides to strike again.',
            'image' => 'images/murder-on-the-orient-express.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The Mysterious Affair at Styles',
            'blurb' => 'A refugee of the Great War, Poirot is settling in England near Styles Court, the country estate of his wealthy benefactor, the elderly Emily Inglethorp.
             When Emily is poisoned and the authorities are baffled, Poirot puts his prodigious sleuthing skills to work. Suspects are plentiful, including the victim’s much younger
              husband, her resentful stepsons, her longtime hired companion, a young family friend working as a nurse, and a London specialist on poisons who just happens to be visiting
               the nearby village.',
            'image' => 'images/the-mysterious-affair-at-styles.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The Murder of Roger Ackroyd',
            'blurb' => 'The peaceful English village of King’s Abbot is stunned. The widow Ferrars dies from an overdose of veronal. Not twenty-four hours later, Roger Ackroyd—the man
            she had planned to marry—is murdered. It is a baffling case involving blackmail and death, that taxes Hercule Poirot’s “grey cells” before he reaches one of the most startling
            conclusions of his career.',
            'image' => 'images/the-murder-of-roger-ackroyd.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'Death on the Nile',
            'blurb' => 'The tranquillity of a cruise along the Nile is shattered by the discovery that Linnet Ridgeway has been shot through the head. She was young, stylish and beautiful,
             a girl who had everything - until she lost her life. Hercule Poirot recalls an earlier outburst by a fellow passenger: \'I\'d like to put my dear little pistol against her head
             and just press the trigger.\' Yet in this exotic setting, nothing is ever quite what it seems...',
            'image' => 'images/death-on-the-nile.jpg',
        ]);
        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'Murder at the Vicarage',
            'blurb' => '‘Anyone who murdered Colonel Protheroe,’ declared the parson, brandishing a carving knife above
            a joint of roast beef, ‘would be doing the world at large a favour!’ It was a careless remark for a man of the
            cloth. And one which was to come back and haunt the clergyman just a few hours later – when the colonel was found
            shot dead in the clergyman’s study. But as Miss Marple soon discovers, the whole village seems to have had a motive to kill Colonel Protheroe.',
            'image' => 'images/murder-at-the-vicarage.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The A.B.C. Murders',
            'blurb' => 'There\'s a serial killer on the loose. His macabre calling card is to leave the ABC Railway Guide beside each victim\'s body. But if
             A is for Alice Asher, bludgeoned to death in Andover, and B is for Betty Bernard, strangled with her belt on
             the beach at Bexhill, who will then be Victim C? Considered to be one of Agatha Christie\'s best.',
            'image' => 'images/the-abc-murders.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The Man in the Brown Suit',
            'blurb' => 'Newly-orphaned Anne Beddingfeld is a nice English girl looking for a bit of adventure in London.
             But she stumbles upon more than she bargained for! Anne is on the platform at Hyde Park Corner tube station when
             a man falls onto the live track, dying instantly. A doctor examines the man, pronounces him dead, and leaves,
             dropping a note on his way. Anne picks up the note, which reads "17.1 22 Kilmorden Castle". The next day the newspapers
             report that a beautiful ballet dancer has been found dead there-- brutally strangled. A fabulous fortune in diamonds has
             vanished. And now, aboard the luxury liner Kilmorden Castle, mysterious strangers pillage her cabin and try to strangle her.
              What are they looking for? Why should they want her dead? Lovely Anne is the last person on earth suited to solve this mystery...
              and the only one who can! Anne\'s journey to unravel the mystery takes her as far afield as Africa and the tension mounts with
               every step... and Anne finds herself struggling to unmask a faceless killer known only as \'The Colonel\'....',
            'image' => 'images/the-man-in-the-brown-suit.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The Body in the Library',
            'blurb' => 'It’s seven in the morning. The Bantrys wake to find the body of a young woman in their library. She is wearing evening
            dress and heavy make-up, which is now smeared across her cheeks. But who is she? How did she get there?
            And what is the connection with another dead girl, whose charred remains are later discovered in an abandoned
             quarry? The respectable Bantrys invite Miss Marple to solve the mystery… before tongues start to wag. Librarian\'s
             note: this entry is for the novel "The Body in the Library." Collections and other Miss Marple stories are located
             elsewhere on Goodreads. The series includes 12 novels and 20 short stories. Entries for the short stories can be
             found by searching Goodreads for: "a Miss Marple Short Story."',
            'image' => 'images/the-body-in-the-library.jpg',
        ]);

        Book::create([
            'author_id' => 5,
            'genre_id' => 7,
            'title' => 'The Murder on the Links',
            'blurb' => 'When Hercule Poirot and his sidekick Arthur Hastings arrive in the French village of Merlinville-sur-Mer,
            France, to meet their client Paul Renauld they learn from Paris police that he has been found that morning stabbed
            in the back with a letter opener and left in a newly dug grave adjacent to a local golf course. Among the plausible
             suspects are Renauld\'s wife Eloise, his son Jack, an unknown visitor of the previous day, Renauld\'s immediate
             neighbor Madame Daubreuil, and the mysterious "Cinderella" of Hasting\'s recent acquaintance--all of whom Poirot
             has reason to suspect. Poirot\'s powers of investigation ultimately triumph over the wiles of an assailant whose
             misdirection and motives are nearly--but not quite--impossible to spot.',
            'image' => 'images/the-murder-on-the-links.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 1,
            'title' => '1984',
            'blurb' => 'Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more
            haunting as its futuristic purgatory becomes more real. Published in 1949, the book offers political satirist
            George Orwell\'s nightmarish vision of a totalitarian, bureaucratic world and one poor stiff\'s attempt to find
            individuality. The brilliance of the novel is Orwell\'s prescience of modern life—the ubiquity of television,
        the distortion of the language—and his ability to construct such a thorough version of hell. Required reading for
        students since it was published, it ranks among the most terrifying novels ever written.',
            'image' => 'images/1984.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 12,
            'title' => 'Animal Farm',
            'blurb' => 'A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans,
             they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most
             telling satiric fables ever penned –a razor-edged fairy tale for grown-ups that records the evolution from revolution
             against tyranny to a totalitarianism just as terrible. When Animal Farm was first published, Stalinist Russia was
             seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever
             banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.',
            'image' => 'images/animal-farm.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 13,
            'title' => 'Down and Out in Paris and London',
            'blurb' => 'This unusual fictional memoir - in good part autobiographical - narrates without self-pity and often
             with humor the adventures of a penniless British writer among the down-and-outs of two great cities. The Parisian
             episode is fascinating for its expose of the kitchens of posh French restaurants, where the narrator works at the
              bottom of the culinary echelon as dishwasher, or plongeur. In London, while waiting for a job, he experiences the
              world of tramps, street people, and free lodging houses. In the tales of both cities we learn some sobering Orwellian
              truths about poverty and of society.',
            'image' => 'images/down-and-out-in-paris-and-london.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 10,
            'title' => 'Homage to Catalonia',
            'blurb' => 'In 1936 George Orwell travelled to Spain to report on the Civil War and instead joined the fight
            against the Fascists. This famous account describes the war and Orwell’s own experiences. Introduction by Lionel Trilling.',
            'image' => 'images/homage-to-catalonia.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 12,
            'title' => 'Burmese Days',
            'blurb' => 'Set in the days of the Empire, with the British ruling in Burma, Orwell\'s book describes corruption
             and imperial bigotry. Flory, a white timber merchant, befriends Dr Veraswami, a black enthusiast for the Empire,
              whose downfall can only be prevented by membership at an all-white club.',
            'image' => 'images/burmese-days.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 13,
            'title' => 'The Road to Wigan Pier',
            'blurb' => 'A searing account of George Orwell’s experiences of working-class life in the bleak industrial
             heartlands of Yorkshire and Lancashire, The Road to Wigan Pier is a brilliant and bitter polemic that has
             lost none of its political impact over time. His graphically unforgettable descriptions of social injustice,
              slum housing, mining conditions, squalor, hunger and growing unemployment are written with unblinking honesty,
               fury and great humanity.',
            'image' => 'images/the-road-to-wigan-pier.jpg',
        ]);

        Book::create([
            'author_id' => 10,
            'genre_id' => 12,
            'title' => 'Keep the Aspidistra Flying',
            'blurb' => 'London, 1936. Gordon Comstock has declared war on the money god; and Gordon is losing the war.
            Nearly 30 and "rather moth-eaten already," a poet whose one small book of verse has fallen "flatter than any pancake,"
             Gordon has given up a "good" job and gone to work in a bookshop at half his former salary. Always broke,
             but too proud to accept charity, he rarely sees his few friends and cannot get the virginal Rosemary to bed
              because (or so he believes), "If you have no money ... women won\'t love you." On the windowsill of Gordon\'s
               shabby rooming-house room is a sickly but unkillable aspidistra--a plant he abhors as the banner of the sort of
                "mingy, lower-middle-class decency" he is fleeing in his downward flight.',
            'image' => 'images/keep-the-aspidistra-flying.jpg',
        ]);
        Book::create([
            'author_id' => 10,
            'genre_id' => 12,
            'title' => 'Coming Up for Air',
            'blurb' => 'George Bowling, the hero of Orwell\'s comic novel, is a middle-aged insurance salesman who lives in
             an average English suburban row house with a wife and two children. One day, after winning some money from a bet,
              he goes back to the village where he grew up, to fish for carp in a pool he remembers from thirty years before.
              The pool, alas, is gone, the village has changed beyond recognition, and the principal event of his holiday is
              an accidental bombing by the RAF.',
            'image' => 'images/coming-up-for-air.jpg',
        ]);
        Book::create([
            'author_id' => 10,
            'genre_id' => 13,
            'title' => 'Why I Write',
            'blurb' => 'Whether puncturing the lies of politicians, wittily dissecting the English character or telling
             unpalatable truths about war, Orwell\'s timeless, uncompromising essays are more relevant, entertaining and
             essential than ever in today\'s era of spin.',
            'image' => 'images/why-i-write.jpg',
        ]);


        BookCopy::factory(10)->create([
            'book_id' => 7,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 6,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 5,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 4,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 3,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 2,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 1,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 8,
        ]);

        BookCopy::factory(10)->create([
            'book_id' => 9,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 10,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 11,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 12,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 13,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 14,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 15,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 16,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 17,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 18,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 19,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 20,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 21,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 22,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 23,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 24,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 25,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 26,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 27,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 28,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 29,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 30,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 31,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 32,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 33,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 34,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 35,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 36,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 37,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 38,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 39,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 40,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 41,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 42,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 43,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 44,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 45,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 46,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 47,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 48,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 49,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 50,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 51,
        ]);
        BookCopy::factory(5)->create([
            'book_id' => 52,
        ]);

        BookCopy::factory(5)->create([
            'book_id' => 53,
        ]);

        Genre::create([
            'title' => 'Sci - Fi'
        ]);

        Genre::create([
            'title' => 'Romance'
        ]);

        Genre::create([
            'title' => 'Thriller'
        ]);

        Genre::create([
            'title' => 'Fantasy'
        ]);

        Genre::create([
            'title' => 'Horror'
        ]);

        Genre::create([
            'title' => 'Comedy'
        ]);

        Genre::create([
            'title' => 'Mystery'
        ]);

        Genre::create([
            'title' => 'Adventure'
        ]);

        Genre::create([
            'title' => 'Cooking'
        ]);

        Genre::create([
            'title' => 'History'
        ]);

        Genre::create([
            'title' => 'Novel'
        ]);

        Genre::create([
            'title' => 'Fiction'
        ]);

        Genre::create([
            'title' => 'Nonfiction'
        ]);

        Author::create([
            'name' => 'J. K. Rowling'
        ]);

        Author::create([
            'name' => 'Charles Dickens'
        ]);

        Author::create([
            'name' => 'Isaac Asimov'
        ]);

        Author::create([
            'name' => 'Denise Robins'
        ]);

        Author::create([
            'name' => 'Agatha Christie'
        ]);

        Author::create([
            'name' => 'Lewis Carroll'
        ]);

        Author::create([
            'name' => 'Mark Twain'
        ]);

        Author::create([
            'name' => 'Ernest Hemingway'
        ]);

        Author::create([
            'name' => 'Jane Austen'
        ]);

        Author::create([
            'name' => 'George Orwell'
        ]);
////
//        Loan::create([
//            'user_id' => 3,
//            'handed_in' => 0,
//            'created_at' => '2021-12-10 15:54:01',
//            'updated_at' => '2021-12-10 15:54:01'
//        ]);
//
//        BookCopy::create([
//           'loan_id' => 1,
//           'book_copy_id' => 51,
//        ]);
    }
}
