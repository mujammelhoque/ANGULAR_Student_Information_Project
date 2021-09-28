import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AddComponent } from './students/add/add.component';
import { SingleComponent } from './students/single/single.component';
import { ViewComponent } from './students/view/view.component';
import { EditComponent } from './students/edit/edit.component';
import { PhoneViewComponent } from './phone/view/view.component';
import { LoginComponent } from './login/login.component';


const routes: Routes = [
  {path: '', redirectTo: 'login', pathMatch: 'full'},
  {path: 'add', component: AddComponent},
  {path: 'login', component: LoginComponent},
  {path: 'view', component: ViewComponent},
  {path: 'edit/:id', component: EditComponent},
  {path: 'single/:id', component: SingleComponent},
  {path: 'phone', component: PhoneViewComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
