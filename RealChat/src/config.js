export const apiDomain = 'http://localhost:8000/'
export const loginUrl = apiDomain + 'oauth/token'
export const userUrl = apiDomain + 'api/users'

export const getHeaders = function () {
  const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
  const headers = {
    'Accept': 'application/json',
    'Authorization': 'Bearer' + tokenData.access_token
  }
  return headers
}
