import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/item/';

export default [
  <Route path="/items/create" component={Create} exact key="create" />,
  <Route path="/items/edit/:id" component={Update} exact key="update" />,
  <Route path="/items/show/:id" component={Show} exact key="show" />,
  <Route path="/items/" component={List} exact strict key="list" />,
  <Route path="/items/:page" component={List} exact strict key="page" />
];
