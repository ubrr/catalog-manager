import React from 'react'
import { Switch, Route, Redirect } from 'react-router-dom'

import { FakePassportPage } from './pages/FakePassportPage'
import { ProfilePage } from './pages/ProfilePage'

import { AuthPage } from './pages/AuthPage'


export const useRoutes = isAuthenticated => {
    if (isAuthenticated) {
        return (
            <Switch>
                <Route path="/fakepassport" exact>
                    <FakePassportPage />
                </Route>
                <Route path="/profile" exact>
                    <ProfilePage />
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