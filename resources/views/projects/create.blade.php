<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
    </head>
    <body>
        <h1> Create a New Project </h1>
       
           
            <form method="POST" action="/projects">
            {{ csrf_field() }}
                <div>
                    <input type="text" name = "title" placeholder="project title">
                </div>


                 <div>
                   <textarea name="description" id="" cols="30" rows="10" placeholder="Project Description"></textarea>
                </div>

            <div>
                <button type="submit">Create Project</button>
            </div>

            </form>
            
    

        

    </body>
    </html>