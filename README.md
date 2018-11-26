# Kikundi

## Important Todos

0) Find a solution to remove the projectpool $_GET Variable in the header
1) Add onclick function on Other Project Idea in homeuser -> just dont fuck my fucking code up this time ty.
2) Check if testing still works
3) If you have any questions ask me on discord or whatsapp or make a new Issue under this github 
[Issue](https://github.com/schmat96/Kikundi/issues/new/choose). If you choose to contact me under whatsapp or discord you need to provide a password to make sure you have atleast read the whole README. Therefore the Password can be found somewhere here.

## Usage so far

If you need to reset the session variables you can call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=reset
```

### NEW USAGE
Call
```
http://localhost/Kikundi/kikundi/view/src/newprojectpool
```
and create a new ProjectPool. Now you should see the Admin Site with the HashCode, this will be used on the next page:

Call:
```
http://localhost/Kikundi/kikundi/view/src/joinuser
```
or 
```
http://localhost/Kikundi/kikundi/view/src/
```
You need to provide the Generated Project-Pool-Hash on Site 1 to join a projectpool
You should be redirected to the Home User Site if you provided a wron ProjectPoolID to an error page.
You can have multiple Members with the same Name... pw (CTRL-F freak you) for whatsapp/discord if you have any question is 'frozen'

Now You can Click on 'new project idea' and create a new project idea. The Project Idea should appear now in Other Projects Ideas
### Common Usage [DEPRECATED]

**All following Requests are Made with GET this can easily be changed by changing the method Call 'setPost()' of the PostController found at the end of [this File](https://github.com/schmat96/Kikundi/blob/master/kikundi/controller/PostController.php).**

You can call this link to add a new Admin with the given Name:
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProjectPool&sessionID=1&name=MaxesPool&adminName=Max
```
This will create a new Admin, if you need to double check this call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=true
```
Now you can create a new Member which needs to tell the application in which Pool (or rather the admin hash code, found in the link above) he wants to join (hashCode=***)
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=registerMember&hashCode=2KIKNeuerMember&name=NeuerMember&sessionID=111
```
Congrats! You created a new Member! Call now this link and create a new project. The sessionID must be set to the MembersID, found under ProjectController with GET['testing'] set to anything.
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=createProject&maxMembers=4&minMembers=4&difficulty=3&name=asd&description=doppelASD&tags=nope&sessionID=3KIKNeuerMember
```

This new Member or any other Member can now like that project:
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=likeProject&project=asd&sessionID=2KIKNeuerMember&status=liked
```
### Tags Usage

#### Add new Tag

This will add a new Tag
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=addTag&tag=Frozen
```

#### Look for Tag

This will check all Tags beginning with the given 'tag=' in this case 'ja'.
```
http://localhost/kikundi/kikundi/controller/PostController.php?postLabel=checkTag&tag=ja
```

## Testing

### How to Test:
Call:
```
http://localhost/kikundi/kikundi/ProjectController.php?testing=all
```

### How to implement a new Test:
1) Create a new File Named: TestClass+Test f.E. TagControllerTest which tests the TagController.
2) Create a new Class with the name TestClass+Test which extends from controller/testing/Test.php a good example can be found under [Here](https://github.com/schmat96/Kikundi/blob/master/kikundi/controller/TagControllerTest.php)
3) Make sure you call all Test Methods in the constructur and add all error-msg to the array.

4) Add your TestClass to the [ProjetController](https://github.com/schmat96/Kikundi/blob/master/kikundi/ProjectController.php) and do the same just like the example TagControllerTest

```
else if ($_GET['testing']=='all') {
    ...
    require_once 'controller/TagControllerTest.php';
    $tct = new TagControllerTest();
    array_push($toTest, $tct);
    <-- HERE -->
} else
```
5) Test your new TestClass by using the instructions declared under the title 'How to Test'

6) Testclasses should be in the same folder as the real classes but Testing should be implemented in the TestRunner.php

### Feel free
Feel free to make it even easier to Test

### Installing



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
