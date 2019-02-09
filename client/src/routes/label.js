import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/label/';

export default [
  <Route path="/labels/create" component={Create} exact key="create" />,
  <Route path="/labels/edit/:id" component={Update} exact key="update" />,
  <Route path="/labels/show/:id" component={Show} exact key="show" />,
  <Route path="/labels/" component={List} exact strict key="list" />,
  <Route path="/labels/:page" component={List} exact strict key="page" />
];
