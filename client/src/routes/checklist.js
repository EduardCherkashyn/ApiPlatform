import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/checklist/';

export default [
  <Route path="/check_lists/create" component={Create} exact key="create" />,
  <Route path="/check_lists/edit/:id" component={Update} exact key="update" />,
  <Route path="/check_lists/show/:id" component={Show} exact key="show" />,
  <Route path="/check_lists/" component={List} exact strict key="list" />,
  <Route path="/check_lists/:page" component={List} exact strict key="page" />
];
