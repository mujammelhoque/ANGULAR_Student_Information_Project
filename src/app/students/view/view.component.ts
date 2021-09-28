import { Component, OnInit } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { ApiResponse } from '../../Model/api-response';
import {Router} from '@angular/router';
import { User } from 'src/app/Model/user';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';
@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css'],
  providers: [NgbCarouselConfig]
})
export class ViewComponent implements OnInit {
  images = [
    {title: 'Learn new Save your life', short: 'Learning is good habit', src: "https://th.bing.com/th/id/Redab6aff41ac1c1f343d239448d97866?rik=PMlR7rzw2hQjFA&riu=http%3a%2f%2ffreedesignfile.com%2fupload%2f2017%2f01%2fClassroom-learning-children-HD-picture-01.jpg&ehk=dHHbvNoxwjPEaBSACKgORoal8R%2fnlIFJsjsu4i22ixI%3d&risl=&pid=ImgRaw"},
    {title: 'We are student', short: 'Second Slide Short', src: "https://static.onecms.io/wp-content/uploads/sites/38/2015/10/12230417/young-students-taking-test.jpg"},
    {title: 'Learn with us', short: 'Third Slide Short', src: "https://chi-nese.com/wp-content/uploads/2020/02/motivating-students.jpg"}
  ];

  users: any;
  token: any;
  constructor( 
    config: NgbCarouselConfig,
    private apiService: ServicesService,
    private router : Router,
    
    ) {
      config.interval = 2000;
      config.keyboard = true;
      config.pauseOnHover = true;
     }

  ngOnInit() {
    this.token =  window.localStorage.getItem('token');
    this.apiService.getUsers()
    .subscribe( (data : any) => {
        this.users = data;
        console.log(this.users);
    });

  }


  deleteUser(user: User): void {
    this.apiService.deleteUser(user.id)
      .subscribe( data => {
        this.users = this.users.filter(u => u !== user);
      });
  }

  edit(user: User): void {
    this.router.navigate(['edit/' + user.id]);
  }
  view(user: User): void {
    this.router.navigate(['single/' + user.id]);
  }
  logOut(){
    if(this.token){
      window.localStorage.removeItem('token');
      this.router.navigate(['login']);
      // this.router.navigate(['login']);
   }
    
  }


}
