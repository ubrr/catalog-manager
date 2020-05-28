import React from 'react'
import { Switch, Route, Redirect } from 'react-router-dom'

import { FakePassportPage } from './pages/FakePassportPage'
import { SecondPage } from './pages/SecondPage'

import { AuthPage } from './pages/AuthPage'


export const useRoutes = isAuthenticated => {
    if (isAuthenticated) {
        return (
            <Switch>
                <Route path="/fakepassport" exact>
                    <FakePassportPage />
                </Route>
                <Route path="/second" exact>
                    <SecondPage />
                </Route>
              <Redirect to="/fakepassport"/>
            </Switch>)
    }
    return (
        <Switch>
            <Route path="/" exact>
                <AuthPage />
            </Route>
            <Redirect to="/"/>
        </Switch>

    )

}